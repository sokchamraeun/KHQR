<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verify Payment - KHQR</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            *,:before,:after{--tw-border-style:solid;--tw-font-weight:initial;--tw-shadow:0 0 #0000;--tw-shadow-color:initial;--tw-shadow-alpha:100%;--tw-inset-shadow:0 0 #0000;--tw-inset-shadow-color:initial;--tw-inset-shadow-alpha:100%;--tw-ring-color:initial;--tw-ring-shadow:0 0 #0000;--tw-inset-ring-color:initial;--tw-inset-ring-shadow:0 0 #0000;--tw-ring-inset:initial;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-offset-shadow:0 0 #0000;--tw-translate-x:0;--tw-translate-y:0;--tw-translate-z:0;--tw-rotate-x:initial;--tw-rotate-y:initial;--tw-rotate-z:initial;--tw-skew-x:initial;--tw-skew-y:initial;--tw-space-x-reverse:0;--tw-blur:initial;--tw-brightness:initial;--tw-contrast:initial;--tw-grayscale:initial;--tw-hue-rotate:initial;--tw-invert:initial;--tw-opacity:initial;--tw-saturate:initial;--tw-sepia:initial;--tw-drop-shadow:initial;--tw-drop-shadow-color:initial;--tw-drop-shadow-alpha:100%;--tw-drop-shadow-size:initial;--tw-duration:initial;--tw-ease:initial;--tw-content:""}*,:before,:after{box-sizing:border-box;border-width:0;border-style:solid;border-color:oklch(92.6% .006 286.033)}:before,:after{--tw-content:""}html,:host{line-height:1.5;-webkit-text-size-adjust:100%;tab-size:4;font-family:"Instrument Sans",ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-feature-settings:normal;font-variation-settings:normal;-webkit-tap-highlight-color:transparent}body{margin:0;line-height:inherit}h1,p{margin:0}a,input,button{font-family:inherit;font-feature-settings:inherit;font-variation-settings:inherit;font-size:100%;font-weight:inherit;line-height:inherit;letter-spacing:inherit;color:inherit;margin:0;padding:0}input{width:100%;border:none;outline:none}button{cursor:pointer}:root{--font-sans:"Instrument Sans",ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";--color-white:#fff;--spacing:.25rem;--text-xs:.75rem;--text-xs--line-height:1rem;--text-sm:.875rem;--text-sm--line-height:1.25rem;--text-lg:1.125rem;--text-lg--line-height:1.5rem;--text-2xl:1.5rem;--text-2xl--line-height:1.75rem;--font-weight-medium:500;--font-weight-semibold:600;--font-weight-bold:700;--tracking-tight:-.025em;--radius-xl:.75rem;--radius-2xl:1rem;--ease-in:cubic-bezier(.4,0,1,1);--ease-out:cubic-bezier(0,0,.2,1);--ease-in-out:cubic-bezier(.4,0,.2,1)}.flex{display:flex}.items-center{align-items:center}.justify-center{justify-content:center}.min-h-screen{min-height:100vh}.mx-auto{margin-inline:auto}.mb-2{margin-bottom:.5rem}.mb-4{margin-bottom:1rem}.mb-6{margin-bottom:1.5rem}.mt-2{margin-top:.5rem}.mt-4{margin-top:1rem}.mt-6{margin-top:1.5rem}.mt-8{margin-top:2rem}.p-6{padding:1.5rem}.p-8{padding:2rem}.px-4{padding-inline:1rem}.px-6{padding-inline:1.5rem}.py-3{padding-block:.75rem}.text-center{text-align:center}.text-2xl{font-size:1.5rem;line-height:1.75rem}.text-sm{font-size:.875rem;line-height:1.25rem}.text-lg{font-size:1.125rem;line-height:1.5rem}.text-xs{font-size:.75rem;line-height:1rem}.font-bold{font-weight:700}.font-semibold{font-weight:600}.font-medium{font-weight:500}.tracking-tight{letter-spacing:-.025em}.w-full{width:100%}.max-w-md{max-width:28rem}.inline-block{display:inline-block}.text-white{color:#fff}.text-gray-500{color:oklch(55.1% .027 286.033)}.text-gray-400{color:oklch(70.7% .022 286.375)}.bg-white{background-color:#fff}.bg-gray-50{background-color:oklch(98.5% 0 0)}.bg-blue-600{background-color:oklch(54.6% .245 262.881)}.rounded-2xl{border-radius:1rem}.rounded-xl{border-radius:.75rem}.rounded-lg{border-radius:.5rem}.border{border-width:1px}.border-gray-300{border-color:oklch(87.2% .01 286.286)}.shadow-lg{--tw-shadow:0 10px 15px -3px #0000001a,0 4px 6px -4px #0000001a;box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.transition{transition-property:color,background-color,border-color,outline-color,text-decoration-color,fill,stroke,opacity,box-shadow,transform,translate,scale,rotate,filter,-webkit-backdrop-filter,backdrop-filter;transition-duration:.15s;transition-timing-function:cubic-bezier(.4,0,.2,1)}.hover\:bg-blue-700:hover{background-color:oklch(48.8% .243 264.376)}.focus\:ring-2:focus{--tw-ring-shadow:var(--tw-ring-inset,) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.focus\:ring-blue-500:focus{--tw-ring-color:oklch(62.3% .214 259.815)}.focus\:border-blue-500:focus{border-color:oklch(62.3% .214 259.815)}@media (prefers-color-scheme:dark){.dark\:bg-gray-900{background-color:oklch(21% .034 264.665)}.dark\:bg-gray-800{background-color:oklch(27.8% .033 256.848)}.dark\:bg-gray-700{background-color:oklch(37.3% .034 259.733)}.dark\:text-gray-100{color:oklch(96.7% .001 286.375)}.dark\:text-gray-400{color:oklch(70.7% .022 286.375)}.dark\:border-gray-600{border-color:oklch(44.6% .03 256.802)}}
    </style>
    @endif
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 flex items-center justify-center min-h-screen p-6">
    <div class="w-full max-w-md mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">
            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold tracking-tight">Verify Payment</h1>
                <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">Enter transaction ID to check payment status</p>
            </div>

            <form method="POST" action="{{ route('payment.verify.check') }}" class="space-y-4">
                @csrf
                <div>
                    <label for="transaction_id" class="block text-sm font-medium mb-2">Transaction ID</label>
                    <input
                        id="transaction_id"
                        name="transaction_id"
                        type="text"
                        placeholder="ORDER_174713..."
                        value="{{ $transactionId ?? old('transaction_id') }}"
                        required
                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                    >
                </div>
                <div>
                    <label for="md5" class="block text-sm font-medium mb-2">MD5 Hash <span class="text-gray-400 font-normal">(optional)</span></label>
                    <input
                        id="md5"
                        name="md5"
                        type="text"
                        placeholder="d60f3db96913029a2af979a1662c1e72"
                        value="{{ $md5 ?? old('md5') }}"
                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition font-mono text-sm"
                    >
                </div>
                <button type="submit"
                        class="w-full py-3 px-6 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl transition">
                    Check Payment
                </button>
            </form>

            @if ($isPaid !== null)
                <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700 text-center">
                    @if ($error)
                        <div class="text-red-500 text-2xl font-bold mb-4">!</div>
                        <h2 class="text-xl font-bold tracking-tight">Verification Failed</h2>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">{{ $error }}</p>
                    @elseif ($isPaid)
                        <div class="w-16 h-16 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-green-600 dark:text-green-300 text-3xl font-bold">&#10003;</span>
                        </div>
                        <div class="inline-block bg-green-600 text-white text-xs font-semibold px-3 py-1 rounded-full mb-3">
                            SUCCESSFULLY
                        </div>
                        <h2 class="text-xl font-bold tracking-tight">Payment Verified</h2>
                        <p class="text-lg font-semibold mt-3 text-green-600 dark:text-green-400">$ {{ number_format($amount, 2) }}</p>
                        <p class="text-xs text-gray-400 mt-3">{{ $transactionId }}</p>
                    @else
                        <div class="text-amber-600 text-2xl font-bold mb-4">!</div>
                        <h2 class="text-xl font-bold tracking-tight">Not Paid Yet</h2>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Transaction has not been completed.</p>
                        <p class="text-xs text-gray-400 mt-2">{{ $transactionId }}</p>
                        @if ($debug)
                            <details class="mt-4 text-left">
                                <summary class="text-xs text-gray-400 cursor-pointer hover:text-gray-600">API Response</summary>
                                <pre class="mt-2 text-xs bg-gray-100 dark:bg-gray-700 p-3 rounded-lg overflow-x-auto">{{ json_encode($debug, JSON_PRETTY_PRINT) }}</pre>
                            </details>
                        @endif
                    @endif
                </div>
            @endif

            <div class="text-center mt-6">
                <a href="{{ route('payment.index') }}"
                   class="inline-block px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl transition">
                    New Payment
                </a>
            </div>
        </div>
    </div>
</body>
</html>
