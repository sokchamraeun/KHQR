<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment Successful</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            *,:before,:after{--tw-border-style:solid;--tw-font-weight:initial;--tw-shadow:0 0 #0000;--tw-shadow-color:initial;--tw-shadow-alpha:100%;--tw-inset-shadow:0 0 #0000;--tw-inset-shadow-color:initial;--tw-inset-shadow-alpha:100%;--tw-ring-color:initial;--tw-ring-shadow:0 0 #0000;--tw-inset-ring-color:initial;--tw-inset-ring-shadow:0 0 #0000;--tw-ring-inset:initial;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-offset-shadow:0 0 #0000;--tw-translate-x:0;--tw-translate-y:0;--tw-translate-z:0;--tw-rotate-x:initial;--tw-rotate-y:initial;--tw-rotate-z:initial;--tw-skew-x:initial;--tw-skew-y:initial;--tw-space-x-reverse:0;--tw-blur:initial;--tw-brightness:initial;--tw-contrast:initial;--tw-grayscale:initial;--tw-hue-rotate:initial;--tw-invert:initial;--tw-opacity:initial;--tw-saturate:initial;--tw-sepia:initial;--tw-drop-shadow:initial;--tw-drop-shadow-color:initial;--tw-drop-shadow-alpha:100%;--tw-drop-shadow-size:initial;--tw-duration:initial;--tw-ease:initial;--tw-content:""}*,:before,:after{box-sizing:border-box;border-width:0;border-style:solid;border-color:oklch(92.6% .006 286.033)}:before,:after{--tw-content:""}html,:host{line-height:1.5;-webkit-text-size-adjust:100%;tab-size:4;font-family:"Instrument Sans",ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-feature-settings:normal;font-variation-settings:normal;-webkit-tap-highlight-color:transparent}body{margin:0;line-height:inherit}h1,p{margin:0}a{color:inherit;text-decoration:inherit}:root{--font-sans:"Instrument Sans",ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";--color-white:#fff;--color-green-500:oklch(72.3% .219 149.579);--spacing:.25rem;--text-sm:.875rem;--text-sm--line-height:1.25rem;--text-base:1rem;--text-base--line-height:1.5rem;--text-lg:1.125rem;--text-lg--line-height:1.5rem;--text-2xl:1.5rem;--text-2xl--line-height:1.75rem;--font-weight-medium:500;--font-weight-semibold:600;--font-weight-bold:700;--tracking-tight:-.025em;--radius-xl:.75rem;--radius-2xl:1rem;--ease-in:cubic-bezier(.4,0,1,1);--ease-out:cubic-bezier(0,0,.2,1);--ease-in-out:cubic-bezier(.4,0,.2,1)}.flex{display:flex}.items-center{align-items:center}.justify-center{justify-content:center}.min-h-screen{min-height:100vh}.mx-auto{margin-inline:auto}.mb-4{margin-bottom:1rem}.mt-6{margin-top:1.5rem}.p-6{padding:1.5rem}.p-8{padding:2rem}.px-6{padding-inline:1.5rem}.py-3{padding-block:.75rem}.text-center{text-align:center}.text-2xl{font-size:1.5rem;line-height:1.75rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.font-bold{font-weight:700}.font-semibold{font-weight:600}.w-full{width:100%}.max-w-md{max-width:28rem}.inline-block{display:inline-block}.text-green-500{color:oklch(72.3% .219 149.579)}.text-gray-500{color:oklch(55.1% .027 286.033)}.text-gray-400{color:oklch(70.7% .022 286.375)}.text-white{color:#fff}.bg-blue-600{background-color:oklch(54.6% .245 262.881)}.bg-white{background-color:#fff}.rounded-2xl{border-radius:1rem}.rounded-xl{border-radius:.75rem}.shadow-lg{--tw-shadow:0 10px 15px -3px #0000001a,0 4px 6px -4px #0000001a;box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.transition{transition-property:color,background-color,border-color,outline-color,text-decoration-color,fill,stroke,opacity,box-shadow,transform,translate,scale,rotate,filter,-webkit-backdrop-filter,backdrop-filter;transition-duration:.15s;transition-timing-function:cubic-bezier(.4,0,.2,1)}.hover\:bg-blue-700:hover{background-color:oklch(48.8% .243 264.376)}@media (prefers-color-scheme:dark){.dark\:bg-gray-900{background-color:oklch(21% .034 264.665)}.dark\:bg-gray-800{background-color:oklch(27.8% .033 256.848)}.dark\:text-gray-100{color:oklch(96.7% .001 286.375)}.dark\:text-gray-400{color:oklch(70.7% .022 286.375)}}
        </style>
    @endif
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 flex items-center justify-center min-h-screen p-6">
    <div class="w-full max-w-md mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 text-center">
            <div class="text-green-500 text-2xl font-bold mb-4">&#10003;</div>
            <h1 class="text-2xl font-bold tracking-tight">Payment Successful</h1>
            <p class="text-gray-500 dark:text-gray-400 mt-6">
                Transaction <span class="font-semibold">{{ $id }}</span> has been processed.
            </p>

            <div class="mt-6 flex gap-3">
                <a href="{{ route('payment.verify', ['id' => $id, 'md5' => '']) }}"
                   class="flex-1 text-center px-4 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-xl transition">
                    Verify Payment
                </a>
                <a href="{{ route('payment.index') }}"
                   class="flex-1 text-center px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl transition">
                    Pay Again
                </a>
            </div>
        </div>
    </div>
</body>
</html>
