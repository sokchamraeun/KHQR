<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scan to Pay - KHQR</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            *,:before,:after{--tw-border-style:solid;--tw-font-weight:initial;--tw-shadow:0 0 #0000;--tw-shadow-color:initial;--tw-shadow-alpha:100%;--tw-inset-shadow:0 0 #0000;--tw-inset-shadow-color:initial;--tw-inset-shadow-alpha:100%;--tw-ring-color:initial;--tw-ring-shadow:0 0 #0000;--tw-inset-ring-color:initial;--tw-inset-ring-shadow:0 0 #0000;--tw-ring-inset:initial;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-offset-shadow:0 0 #0000;--tw-translate-x:0;--tw-translate-y:0;--tw-translate-z:0;--tw-rotate-x:initial;--tw-rotate-y:initial;--tw-rotate-z:initial;--tw-skew-x:initial;--tw-skew-y:initial;--tw-space-x-reverse:0;--tw-blur:initial;--tw-brightness:initial;--tw-contrast:initial;--tw-grayscale:initial;--tw-hue-rotate:initial;--tw-invert:initial;--tw-opacity:initial;--tw-saturate:initial;--tw-sepia:initial;--tw-drop-shadow:initial;--tw-drop-shadow-color:initial;--tw-drop-shadow-alpha:100%;--tw-drop-shadow-size:initial;--tw-duration:initial;--tw-ease:initial;--tw-content:""}*,:before,:after{box-sizing:border-box;border-width:0;border-style:solid;border-color:oklch(92.6% .006 286.033)}:before,:after{--tw-content:""}html,:host{line-height:1.5;-webkit-text-size-adjust:100%;tab-size:4;font-family:"Instrument Sans",ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-feature-settings:normal;font-variation-settings:normal;-webkit-tap-highlight-color:transparent}body{margin:0;line-height:inherit}h1,p{margin:0}:root{--font-sans:"Instrument Sans",ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";--color-white:#fff;--color-black:#000;--spacing:.25rem;--text-xs:.75rem;--text-xs--line-height:1rem;--text-sm:.875rem;--text-sm--line-height:1.25rem;--text-lg:1.125rem;--text-lg--line-height:1.5rem;--text-2xl:1.5rem;--text-2xl--line-height:1.75rem;--font-weight-medium:500;--font-weight-semibold:600;--font-weight-bold:700;--tracking-tight:-.025em;--radius-md:.375rem;--radius-xl:.75rem;--radius-2xl:1rem;--ease-in:cubic-bezier(.4,0,1,1);--ease-out:cubic-bezier(0,0,.2,1);--ease-in-out:cubic-bezier(.4,0,.2,1)}.flex{display:flex}.inline-flex{display:inline-flex}.items-center{align-items:center}.justify-center{justify-content:center}.min-h-screen{min-height:100vh}.mx-auto{margin-inline:auto}.mb-1{margin-bottom:.25rem}.mb-2{margin-bottom:.5rem}.mb-4{margin-bottom:1rem}.mb-6{margin-bottom:1.5rem}.mt-2{margin-top:.5rem}.mt-4{margin-top:1rem}.mt-6{margin-top:1.5rem}.mt-8{margin-top:2rem}.p-2{padding:.5rem}.p-4{padding:1rem}.p-6{padding:1.5rem}.p-8{padding:2rem}.px-4{padding-inline:1rem}.px-6{padding-inline:1.5rem}.py-2{padding-block:.5rem}.py-3{padding-block:.75rem}.text-center{text-align:center}.text-2xl{font-size:1.5rem;line-height:1.75rem}.text-sm{font-size:.875rem;line-height:1.25rem}.text-lg{font-size:1.125rem;line-height:1.5rem}.text-xs{font-size:.75rem;line-height:1rem}.font-bold{font-weight:700}.font-semibold{font-weight:600}.font-medium{font-weight:500}.tracking-tight{letter-spacing:-.025em}.w-full{width:100%}.max-w-md{max-width:28rem}.inline-block{display:inline-block}.text-gray-500{color:oklch(55.1% .027 286.033)}.text-gray-400{color:oklch(70.7% .022 286.375)}.text-gray-600{color:oklch(44.6% .03 256.802)}.text-white{color:#fff}.text-blue-600{color:oklch(54.6% .245 262.881)}.bg-white{background-color:#fff}.bg-gray-50{background-color:oklch(98.5% 0 0)}.bg-gray-100{background-color:oklch(96.7% .001 286.375)}.bg-blue-50{background-color:oklch(97% .014 254.604)}.bg-blue-600{background-color:oklch(54.6% .245 262.881)}.rounded-2xl{border-radius:1rem}.rounded-xl{border-radius:.75rem}.rounded-lg{border-radius:.5rem}.rounded-md{border-radius:.375rem}.border{border-width:1px}.border-gray-200{border-color:oklch(92.8% .006 286.033)}.border-t{border-top-width:1px}.shadow-lg{--tw-shadow:0 10px 15px -3px #0000001a,0 4px 6px -4px #0000001a;box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.shadow-inner{--tw-shadow:inset 0 2px 4px #0000000d;box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.transition{transition-property:color,background-color,border-color,outline-color,text-decoration-color,fill,stroke,opacity,box-shadow,transform,translate,scale,rotate,filter,-webkit-backdrop-filter,backdrop-filter;transition-duration:.15s;transition-timing-function:cubic-bezier(.4,0,.2,1)}.hover\:bg-blue-700:hover{background-color:oklch(48.8% .243 264.376)}.hover\:bg-gray-200:hover{background-color:oklch(92.8% .006 286.033)}.active\:scale-95:active{transform:scale(.95)}.space-y-1>:where(:not(:first-child)){margin-top:.25rem}@media (prefers-color-scheme:dark){.dark\:bg-gray-900{background-color:oklch(21% .034 264.665)}.dark\:bg-gray-800{background-color:oklch(27.8% .033 256.848)}.dark\:bg-gray-700{background-color:oklch(37.3% .034 259.733)}.dark\:text-gray-100{color:oklch(96.7% .001 286.375)}.dark\:text-gray-400{color:oklch(70.7% .022 286.375)}.dark\:text-gray-300{color:oklch(87.2% .01 286.286)}.dark\:border-gray-700{border-color:oklch(37.3% .034 259.733)}.dark\:border-gray-600{border-color:oklch(44.6% .03 256.802)}.dark\:bg-gray-700\/50{background-color:color-mix(in oklch, oklch(37.3% .034 259.733) 50%, transparent)}}
    </style>
    @endif
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 flex items-center justify-center min-h-screen p-6">
    <div class="w-full max-w-md mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">
            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold tracking-tight">Scan to Pay</h1>
                <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">Scan with Bakong app to complete payment</p>
            </div>

            @if ($qrImage)
                <div class="flex justify-center mb-4">
                    <div class="bg-white p-4 rounded-xl shadow-inner inline-block">
                        <img src="{{ $qrImage }}" alt="KHQR Code" width="300" class="block">
                    </div>
                </div>

                <div class="text-center space-y-1 mb-6">
                    <p class="text-lg font-bold">$ {{ number_format($amount, 2) }}</p>
                    <p class="text-xs text-gray-400">CHAMRAEUN SOK</p>
                </div>

                <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-4 mb-6 text-sm space-y-1">
                    <div class="flex justify-between">
                        <span class="text-gray-500 dark:text-gray-400">Transaction</span>
                        <span class="font-medium">{{ $result['data']['transaction_id'] ?? $result['transaction_id'] ?? 'N/A' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500 dark:text-gray-400">MD5 Hash</span>
                        <span class="font-mono text-xs text-gray-600 dark:text-gray-300">{{ $result['data']['md5'] ?? 'N/A' }}</span>
                    </div>
                </div>

                <button
                    onclick="copyPayload()"
                    class="w-full py-2 px-4 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-sm font-medium rounded-lg transition active:scale-95"
                >
                    Copy KHQR Data
                </button>
            @else
                <div class="text-center py-8">
                    <div class="text-gray-400 text-2xl mb-2">!</div>
                    <p class="text-gray-500">Failed to generate QR code.</p>
                    <p class="text-xs text-gray-400 mt-2">{{ session('errors')->first('api_error') ?? 'Please try again' }}</p>
                </div>
            @endif

            <div class="flex gap-3 mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                <a href="{{ route('payment.verify', ['id' => $result['data']['transaction_id'] ?? '', 'md5' => $result['data']['md5'] ?? '']) }}"
                   class="flex-1 text-center px-4 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-xl transition">
                    Verify Payment
                </a>
                <a href="{{ route('payment.index') }}"
                   class="flex-1 text-center px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl transition">
                    New Payment
                </a>
            </div>
        </div>
    </div>

    <script>
        function copyPayload() {
            const text = @json($result['data']['qr'] ?? '');
            if (!text) return;
            navigator.clipboard.writeText(text).then(() => {
                const btn = event.target;
                const original = btn.textContent;
                btn.textContent = 'Copied!';
                setTimeout(() => btn.textContent = original, 2000);
            });
        }
    </script>
</body>
</html>
