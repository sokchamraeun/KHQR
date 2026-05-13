<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment - {{ config('app.name', 'Laravel') }}</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['ui-sans-serif', 'system-ui'],
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen flex items-center justify-center p-4">

<div class="w-full max-w-md">

    <!-- Card -->
    <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-2xl p-8 border border-gray-100 dark:border-gray-700">

        <!-- Header -->
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-indigo-100 dark:bg-indigo-900 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-indigo-600 dark:text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                </svg>
            </div>

            <h1 class="text-2xl font-bold">Payment</h1>
            <p class="text-gray-500 dark:text-gray-400 mt-1">
                Enter amount and generate QR Visal
            </p>
        </div>

        <!-- Amount -->
        <div class="space-y-6">

            <div>
                <label class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">
                    Amount (THB)
                </label>

                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 text-lg font-semibold">
                        ฿
                    </span>

                    <input
                        type="number"
                        id="price"
                        min="1"
                        step="1"
                        value="100"
                        placeholder="Enter amount"
                        class="w-full pl-10 pr-4 py-4 text-xl font-semibold bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-2xl focus:ring-2 focus:ring-indigo-500 outline-none"
                    />
                </div>
            </div>

            <!-- QR -->
            <div class="text-center">

                <div id="qrPlaceholder"
                     class="w-48 h-48 mx-auto bg-gray-100 dark:bg-gray-700 rounded-2xl flex items-center justify-center">
                    <p class="text-sm text-gray-400">No QR generated</p>
                </div>

                <canvas id="qrCanvas" class="mx-auto hidden"></canvas>
            </div>

            <!-- Button -->
            <button
                id="generateBtn"
                class="w-full py-4 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-bold rounded-2xl shadow-lg transition"
            >
                Generate QR Code
            </button>
        </div>

        <!-- Payment Info -->
        <div id="paymentInfo" class="mt-6 hidden border-t border-gray-200 dark:border-gray-700 pt-4">

            <div class="flex justify-between text-sm">
                <span class="text-gray-500">Amount</span>
                <span id="displayAmount" class="font-semibold">฿0</span>
            </div>

            <div class="flex justify-between text-sm mt-2">
                <span class="text-gray-500">Status</span>
                <span class="text-yellow-500 font-medium">Waiting for payment</span>
            </div>

        </div>

    </div>
</div>

<!-- QR Library -->
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
            width: 220,
            margin: 2,
            color: {
                dark: '#4f46e5',
                light: '#ffffff'
            }
        }, function (err) {
            if (err) {
                qrCanvas.classList.add('hidden');
                qrPlaceholder.classList.remove('hidden');
                qrPlaceholder.innerHTML = '<p class="text-red-400 text-sm">Error generating QR</p>';
            }
        });

        displayAmount.textContent = `฿${parseInt(amount).toLocaleString()}`;
        paymentInfo.classList.remove('hidden');
    }

    generateBtn.addEventListener('click', () => {
        const amount = parseInt(priceInput.value);

        if (!amount || amount <= 0) {
            priceInput.classList.add('ring-2', 'ring-red-500');
            return;
        }

        priceInput.classList.remove('ring-red-500');
        generateQR(amount);
    });

    priceInput.addEventListener('keydown', (e) => {
        if (e.key === 'Enter') {
            generateBtn.click();
        }
    });

    // auto generate on load
    if (priceInput.value && parseInt(priceInput.value) > 0) {
        generateQR(parseInt(priceInput.value));
    }
</script>

</body>
</html>