<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\SvgWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment.index');
    }

    public function generate(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
        ]);

        $amount = (float) $request->amount;
        $transactionId = 'ORDER_'.time();

        $data = [
            'transaction_id' => $transactionId,
            'amount' => $amount,
            'success_url' => route('payment.success', ['id' => $transactionId]),
            'remark' => 'Payment via KHQR',
        ];

        $secretKey = config('services.khqr.secret_key');
        $data['hash'] = sha1($secretKey.$data['transaction_id'].$data['amount'].$data['success_url'].$data['remark']);

        $apiUrl = config('services.khqr.gateway_url').'/'.config('services.khqr.profile_id').'/payment-gateway/v1/payments/qr-api?lang=km';

        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);

        if ($response === false) {
            return back()->withErrors(['api_error' => 'Connection failed: '.$error]);
        }

        $result = json_decode($response, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return back()->withErrors(['api_error' => 'Invalid JSON: '.substr($response, 0, 200)]);
        }

        if (($result['responseCode'] ?? 1) !== 0) {
            return back()->withErrors(['api_error' => ($result['responseMessage'] ?? 'Unknown error')]);
        }

        $qrPayload = $result['data']['qr'] ?? null;

        $qrImage = null;
        $qrError = null;
        if ($qrPayload) {
            try {
                $writer = extension_loaded('gd') ? new PngWriter : new SvgWriter;
                $mime = extension_loaded('gd') ? 'image/png' : 'image/svg+xml';

                $qr = new Builder(
                    writer: $writer,
                    data: $qrPayload,
                    encoding: new Encoding('UTF-8'),
                    errorCorrectionLevel: ErrorCorrectionLevel::Medium,
                    size: 400,
                );

                $qrImage = 'data:'.$mime.';base64,'.base64_encode($qr->build()->getString());
            } catch (\Throwable $e) {
                $qrError = $e->getMessage();
                \Log::error('QR generation failed: '.$qrError);
            }
        }

        return view('payment.show', [
            'result' => $result,
            'qrImage' => $qrImage,
            'amount' => $amount,
            'qrError' => $qrError,
        ]);
    }

    public function success(string $id)
    {
        return view('payment.success', compact('id'));
    }

    public function verify(Request $request)
    {
        $transactionId = $request->query('id');
        $md5 = $request->query('md5');

        if (! $transactionId) {
            return view('payment.verify', [
                'transactionId' => null,
                'md5' => null,
                'error' => null,
                'isPaid' => null,
                'amount' => null,
                'debug' => null,
            ]);
        }

        return $this->checkVerification($transactionId, $md5);
    }

    public function verifyCheck(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|string',
            'md5' => 'nullable|string',
        ]);

        return $this->checkVerification($request->transaction_id, $request->md5);
    }

    private function checkVerification(string $transactionId, ?string $md5 = null)
    {
        $profileKey = config('services.khqr.profile_id');
        $hash = sha1($profileKey.$transactionId);

        $verifyUrl = config('services.khqr.gateway_url').'/'.$profileKey.'/payment-gateway/v1/payments/check-trans';

        $postData = [
            'transaction_id' => $transactionId,
            'hash' => $hash,
        ];

        if ($md5) {
            $postData['md5'] = $md5;
        }

        $ch = curl_init($verifyUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($response === false) {
            return view('payment.verify', [
                'transactionId' => $transactionId,
                'md5' => $md5,
                'error' => 'Connection failed: '.$error,
                'isPaid' => false,
                'amount' => null,
                'debug' => null,
            ]);
        }

        $result = json_decode($response, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return view('payment.verify', [
                'transactionId' => $transactionId,
                'md5' => $md5,
                'error' => 'Invalid response from server',
                'isPaid' => false,
                'amount' => null,
                'debug' => null,
            ]);
        }

        $isPaid = (
            isset($result['responseCode']) &&
            (int) $result['responseCode'] === 0 &&
            isset($result['data']['status']) &&
            strtolower($result['data']['status']) === 'success'
        );

        return view('payment.verify', [
            'transactionId' => $transactionId,
            'md5' => $md5,
            'error' => null,
            'isPaid' => $isPaid,
            'amount' => $result['data']['amount'] ?? null,
            'debug' => $result,
        ]);
    }
}
