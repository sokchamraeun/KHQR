<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KHQR Payment</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            *,:before,:after{--tw-border-style:solid;--tw-font-weight:initial;--tw-shadow:0 0 #0000;--tw-shadow-color:initial;--tw-shadow-alpha:100%;--tw-inset-shadow:0 0 #0000;--tw-inset-shadow-color:initial;--tw-inset-shadow-alpha:100%;--tw-ring-color:initial;--tw-ring-shadow:0 0 #0000;--tw-inset-ring-color:initial;--tw-inset-ring-shadow:0 0 #0000;--tw-ring-inset:initial;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-offset-shadow:0 0 #0000;--tw-translate-x:0;--tw-translate-y:0;--tw-translate-z:0;--tw-rotate-x:initial;--tw-rotate-y:initial;--tw-rotate-z:initial;--tw-skew-x:initial;--tw-skew-y:initial;--tw-space-x-reverse:0;--tw-blur:initial;--tw-brightness:initial;--tw-contrast:initial;--tw-grayscale:initial;--tw-hue-rotate:initial;--tw-invert:initial;--tw-opacity:initial;--tw-saturate:initial;--tw-sepia:initial;--tw-drop-shadow:initial;--tw-drop-shadow-color:initial;--tw-drop-shadow-alpha:100%;--tw-drop-shadow-size:initial;--tw-duration:initial;--tw-ease:initial;--tw-content:""}*,:before,:after{box-sizing:border-box;border-width:0;border-style:solid;border-color:oklch(92.6% .006 286.033)}:before,:after{--tw-content:""}html,:host{line-height:1.5;-webkit-text-size-adjust:100%;tab-size:4;font-family:"Instrument Sans",ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-feature-settings:normal;font-variation-settings:normal;-webkit-tap-highlight-color:transparent}body{margin:0;line-height:inherit}h1,p{margin:0}input,button{font-family:inherit;font-feature-settings:inherit;font-variation-settings:inherit;font-size:100%;font-weight:inherit;line-height:inherit;letter-spacing:inherit;color:inherit;margin:0;padding:0}button{cursor:pointer}:root{--font-sans:"Instrument Sans",ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";--color-white:#fff;--spacing:.25rem;--text-sm:.875rem;--text-sm--line-height:1.25rem;--text-base:1rem;--text-base--line-height:1.5rem;--text-lg:1.125rem;--text-lg--line-height:1.5rem;--text-2xl:1.5rem;--text-2xl--line-height:1.75rem;--font-weight-medium:500;--font-weight-semibold:600;--font-weight-bold:700;--tracking-tight:-.025em;--radius-xl:.75rem;--radius-2xl:1rem;--ease-in:cubic-bezier(.4,0,1,1);--ease-out:cubic-bezier(0,0,.2,1);--ease-in-out:cubic-bezier(.4,0,.2,1)}.container{width:100%}.flex{display:flex}.items-center{align-items:center}.justify-center{justify-content:center}.min-h-screen{min-height:100vh}.mx-auto{margin-inline:auto}.mb-2{margin-bottom:.5rem}.mb-6{margin-bottom:1.5rem}.mb-8{margin-bottom:2rem}.mt-1{margin-top:.25rem}.p-6{padding:1.5rem}.p-8{padding:2rem}.px-4{padding-inline:1rem}.px-6{padding-inline:1.5rem}.py-3{padding-block:.75rem}.text-center{text-align:center}.text-2xl{font-size:1.5rem;line-height:1.75rem}.text-sm{font-size:.875rem;line-height:1.25rem}.font-bold{font-weight:700}.font-semibold{font-weight:600}.font-medium{font-weight:500}.tracking-tight{letter-spacing:-.025em}.w-full{width:100%}.max-w-md{max-width:28rem}.block{display:block}.hidden{display:none}.text-gray-500{color:oklch(55.1% .027 286.033)}.text-red-500{color:oklch(63.7% .237 25.331)}.border-gray-300{border-color:oklch(87.2% .01 286.286)}.bg-white{background-color:#fff}.bg-gray-50{background-color:oklch(98.5% 0 0)}.bg-blue-600{background-color:oklch(54.6% .245 262.881)}.rounded-2xl{border-radius:1rem}.rounded-xl{border-radius:.75rem}.border{border-width:1px}.shadow-lg{--tw-shadow:0 10px 15px -3px #0000001a,0 4px 6px -4px #0000001a;box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.outline-none{outline:2px solid transparent;outline-offset:2px}.transition{transition-property:color,background-color,border-color,outline-color,text-decoration-color,fill,stroke,opacity,box-shadow,transform,translate,scale,rotate,filter,-webkit-backdrop-filter,backdrop-filter;transition-duration:.15s;transition-timing-function:cubic-bezier(.4,0,.2,1)}.disabled\:opacity-50:disabled{opacity:.5}.disabled\:cursor-not-allowed:disabled{cursor:not-allowed}.hover\:bg-blue-700:hover{background-color:oklch(48.8% .243 264.376)}.focus\:ring-2:focus{--tw-ring-shadow:var(--tw-ring-inset,) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.focus\:ring-blue-500:focus{--tw-ring-color:oklch(62.3% .214 259.815)}.focus\:border-blue-500:focus{border-color:oklch(62.3% .214 259.815)}.space-y-5>:where(:not(:first-child)){margin-top:1.25rem}@media (prefers-color-scheme:dark){.dark\:bg-gray-900{background-color:oklch(21% .034 264.665)}.dark\:bg-gray-800{background-color:oklch(27.8% .033 256.848)}.dark\:bg-gray-700{background-color:oklch(37.3% .034 259.733)}.dark\:text-gray-100{color:oklch(96.7% .001 286.375)}.dark\:text-gray-400{color:oklch(70.7% .022 286.375)}.dark\:border-gray-600{border-color:oklch(44.6% .03 256.802)}}
        </style>
    @endif
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 flex items-center justify-center min-h-screen p-6">
    <div class="w-full max-w-md mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold tracking-tight">KHQR Payment</h1>
                <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">Enter amount to generate payment QR</p>
            </div>

            <form method="POST" action="{{ route('payment.generate') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="amount" class="block text-sm font-medium mb-2">Amount (USD)</label>
                    <input
                        id="amount"
                        name="amount"
                        type="number"
                        inputmode="decimal"
                        placeholder="0.00"
                        min="0.01"
                        step="0.01"
                        required
                        class="w-full px-4 py-3 text-2xl font-semibold border border-gray-300 dark:border-gray-600 rounded-xl bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                    >
                </div>

                <button
                    type="submit"
                    id="submitBtn"
                    class="w-full py-3 px-6 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl transition disabled:opacity-50 disabled:cursor-not-allowed"
                    disabled
                >
                    Generate KHQR
                </button>
            </form>
        </div>
    </div>

    <script>
        const input = document.getElementById('amount');
        const btn = document.getElementById('submitBtn');
        input.addEventListener('input', () => {
            btn.disabled = !(parseFloat(input.value) > 0);
        });
    </script>
</body>
</html>
