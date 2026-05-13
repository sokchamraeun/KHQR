<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment - {{ config('app.name', 'Laravel') }}</title>
    @fonts
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            @import 'tailwindcss';
        </style>
    @endif
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">
            <div class="text-center mb-8">
                <div class="w-16 h-16 bg-indigo-100 dark:bg-indigo-900 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-indigo-600 dark:text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold">Payment</h1>
                <p class="text-gray-500 dark:text-gray-400 mt-1">Enter the amount and scan to pay</p>
            </div>

            <div class="space-y-6">
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Amount (THB)</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="text-gray-500 dark:text-gray-400 text-lg font-semibold">฿</span>
                        </div>
                        <input
                            type="number"
                            id="price"
                            name="price"
                            min="1"
                            step="1"
                            placeholder="0.00"
                            value="100"
                            class="block w-full pl-10 pr-4 py-3 text-2xl font-bold text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
                        >
                    </div>
                </div>

                <div class="text-center">
                    <canvas id="qrCanvas" class="mx-auto"></canvas>
                    <div id="qrPlaceholder" class="w-48 h-48 mx-auto bg-gray-100 dark:bg-gray-700 rounded-xl flex items-center justify-center">
                        <p class="text-sm text-gray-400">Enter amount & generate</p>
                    </div>
                </div>

                <button
                    id="generateBtn"
                    class="w-full py-3 px-6 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl shadow-md transition cursor-pointer"
                >
                    Generate QR Code
                </button>
            </div>

            <div id="paymentInfo" class="mt-6 hidden">
                <div class="border-t border-gray-200 dark:border-gray-700 pt-4">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500 dark:text-gray-400">Amount</span>
                        <span id="displayAmount" class="font-semibold">฿0</span>
                    </div>
                    <div class="flex justify-between text-sm mt-2">
                        <span class="text-gray-500 dark:text-gray-400">Status</span>
                        <span class="text-yellow-600 font-medium">Waiting for payment</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/qrcode/build/qrcode.min.js"></script>
    <script>
        const priceInput = document.getElementById('price');
        const generateBtn = document.getElementById('generateBtn');
        const qrCanvas = document.getElementById('qrCanvas');
        const qrPlaceholder = document.getElementById('qrPlaceholder');
        const paymentInfo = document.getElementById('paymentInfo');
        const displayAmount = document.getElementById('displayAmount');

        function generateQR(amount) {
            const merchantId = 'MERCHANT-001';
            const payload = `PromptPay|${merchantId}|${amount}`;

            qrPlaceholder.classList.add('hidden');
            qrCanvas.classList.remove('hidden');

            QRCode.toCanvas(qrCanvas, payload, {
                width: 192,
                margin: 2,
                color: {
                    dark: '#1e1b4b',
                    light: '#ffffff'
                }
            }, function (err) {
                if (err) {
                    qrCanvas.classList.add('hidden');
                    qrPlaceholder.classList.remove('hidden');
                    qrPlaceholder.innerHTML = '<p class="text-sm text-red-400">Error generating QR</p>';
                }
            });

            displayAmount.textContent = `฿${parseInt(amount).toLocaleString()}`;
            paymentInfo.classList.remove('hidden');
        }

        generateBtn.addEventListener('click', function () {
            const amount = parseInt(priceInput.value);
            if (!amount || amount <= 0) {
                priceInput.classList.add('ring-2', 'ring-red-500');
                return;
            }
            priceInput.classList.remove('ring-2', 'ring-red-500');
            generateQR(amount);
        });

        priceInput.addEventListener('keydown', function (e) {
            if (e.key === 'Enter') {
                generateBtn.click();
            }
        });

        if (priceInput.value && parseInt(priceInput.value) > 0) {
            generateQR(parseInt(priceInput.value));
        }
    </script>
</body>
</html>
