<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use KHQR\BakongKHQR;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('products.index')->withErrors(['cart' => 'Cart is empty']);
        }

        $ids = array_keys($cart);
        $products = Product::whereIn('id', $ids)->get()->keyBy('id');
        $total = 0;
        $items = [];
        foreach ($cart as $id => $item) {
            $product = $products->get($id);
            if (!$product) {
                continue;
            }
            $qty = $item['quantity'];
            $total += $product->price * $qty;
            $items[] = ['product' => $product, 'quantity' => $qty];
        }

        if (empty($items)) {
            return redirect()->route('cart.index')->withErrors(['cart' => 'Cart contains invalid items']);
        }

        $transactionId = 'ORDER_'.time();

        $data = [
            'transaction_id' => $transactionId,
            'amount' => $total,
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
            return back()->withErrors(['api_error' => 'Invalid response from server']);
        }

        if (($result['responseCode'] ?? 1) !== 0) {
            return back()->withErrors(['api_error' => $result['responseMessage'] ?? 'Unknown error']);
        }

        $qrPayload = $result['data']['qr'] ?? null;

        $qrImage = null;
        $qrError = null;
        if ($qrPayload) {
            try {
                $khqr = BakongKHQR::forLocalGeneration();
                $qrImage = $khqr->getQrImageBase64([
                    'payload' => $qrPayload,
                    'data' => [
                        'merchant_name' => 'CHAMRAEUN SOK',
                        'amount' => $total,
                        'currency' => 'USD',
                    ],
                    'currency' => 'USD',
                    'width' => 400,
                ]);
            } catch (\Throwable $e) {
                $qrError = $e->getMessage();
                \Log::error('QR generation failed: '.$qrError);
            }
        }

        return view('checkout.index', [
            'result' => $result,
            'qrImage' => $qrImage,
            'total' => $total,
            'items' => $items,
            'qrError' => $qrError,
        ]);
    }
}
