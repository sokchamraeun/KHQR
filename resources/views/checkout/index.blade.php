<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout - KHQR</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            *,:before,:after{--tw-border-style:solid;--tw-font-weight:initial;--tw-shadow:0 0 #0000;--tw-shadow-color:initial;--tw-shadow-alpha:100%;--tw-inset-shadow:0 0 #0000;--tw-inset-shadow-color:initial;--tw-inset-shadow-alpha:100%;--tw-ring-color:initial;--tw-ring-shadow:0 0 #0000;--tw-inset-ring-color:initial;--tw-inset-ring-shadow:0 0 #0000;--tw-ring-inset:initial;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-offset-shadow:0 0 #0000;--tw-translate-x:0;--tw-translate-y:0;--tw-translate-z:0;--tw-rotate-x:initial;--tw-rotate-y:initial;--tw-rotate-z:initial;--tw-skew-x:initial;--tw-skew-y:initial;--tw-space-x-reverse:0;--tw-blur:initial;--tw-brightness:initial;--tw-contrast:initial;--tw-grayscale:initial;--tw-hue-rotate:initial;--tw-invert:initial;--tw-opacity:initial;--tw-saturate:initial;--tw-sepia:initial;--tw-drop-shadow:initial;--tw-drop-shadow-color:initial;--tw-drop-shadow-alpha:100%;--tw-drop-shadow-size:initial;--tw-duration:initial;--tw-ease:initial;--tw-content:""}*,:before,:after{box-sizing:border-box;border-width:0;border-style:solid;border-color:oklch(92.6% .006 286.033)}:before,:after{--tw-content:""}html,:host{line-height:1.5;-webkit-text-size-adjust:100%;tab-size:4;font-family:"Instrument Sans",ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"}body{margin:0;line-height:inherit}h1,h2,p,ul{margin:0}ul{padding:0;list-style:none}a{color:inherit;text-decoration:inherit}button{font-family:inherit;font-feature-settings:inherit;font-variation-settings:inherit;font-size:100%;font-weight:inherit;line-height:inherit;letter-spacing:inherit;color:inherit;margin:0;padding:0}button{cursor:pointer}:root{--font-sans:"Instrument Sans",ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";--color-white:#fff;--color-gray-50:oklch(98.5% .002 247.839);--color-gray-100:oklch(96.7% .003 264.542);--color-gray-200:oklch(92.8% .006 264.531);--color-gray-300:oklch(87.2% .01 258.338);--color-gray-400:oklch(70.7% .022 261.325);--color-gray-500:oklch(55.1% .027 264.364);--color-gray-600:oklch(44.6% .03 256.802);--color-gray-700:oklch(37.3% .034 259.733);--color-gray-800:oklch(27.8% .033 256.848);--color-gray-900:oklch(21% .034 264.665);--color-blue-500:oklch(62.3% .214 259.815);--color-blue-600:oklch(54.6% .245 262.881);--color-blue-700:oklch(48.8% .243 264.376);--color-green-600:oklch(62.7% .194 149.214);--color-green-700:oklch(52.7% .154 150.069);--spacing:.25rem;--text-xs:.75rem;--text-xs--line-height:1rem;--text-sm:.875rem;--text-sm--line-height:1.25rem;--text-base:1rem;--text-base--line-height:1.5rem;--text-lg:1.125rem;--text-lg--line-height:1.5rem;--text-xl:1.25rem;--text-xl--line-height:1.75rem;--text-2xl:1.5rem;--text-2xl--line-height:1.75rem;--font-weight-medium:500;--font-weight-semibold:600;--font-weight-bold:700;--tracking-tight:-.025em;--radius-lg:.5rem;--radius-xl:.75rem;--radius-2xl:1rem;--shadow-sm:0 1px 3px 0 #0000001a;--shadow-md:0 4px 6px -1px #0000001a;--shadow-lg:0 10px 15px -3px #0000001a;--shadow-inner:inset 0 2px 4px 0 #0000000d}
        </style>
    @endif
</head>
<body class="bg-gray-50 text-gray-900 min-h-screen flex flex-col">
    <nav class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-5xl mx-auto px-4 py-3 flex items-center justify-between">
            <a href="{{ route('products.index') }}" class="text-lg font-bold tracking-tight">MyShop</a>
            <div class="flex items-center gap-4 text-sm">
                <a href="{{ route('products.index') }}" class="hover:text-blue-600">Products</a>
                <a href="{{ route('cart.index') }}" class="hover:text-blue-600">Cart</a>
            </div>
        </div>
    </nav>

    <main class="flex-1 max-w-md mx-auto w-full px-4 py-8">
        <div class="bg-white rounded-2xl shadow-lg p-8">
            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold tracking-tight">Scan to Pay</h1>
                <p class="text-gray-500 text-sm mt-1">Scan with Bakong app to complete payment</p>
            </div>

            @if ($qrImage)
                <div class="flex justify-center mb-4">
                    <div class="bg-white p-4 rounded-xl shadow-inner inline-block">
                        <img src="{{ $qrImage }}" alt="KHQR Code" width="300" class="block">
                    </div>
                </div>

                <div class="text-center mb-6">
                    <p class="text-lg font-bold">$ {{ number_format($total, 2) }}</p>
                    <p class="text-xs text-gray-400">CHAMRAEUN SOK</p>
                </div>

                <div class="bg-gray-50 rounded-xl p-4 mb-6 text-sm space-y-2">
                    <p class="font-semibold mb-1">Items</p>
                    @foreach ($items as $item)
                        <div class="flex justify-between text-gray-600">
                            <span>{{ $item['product']->name }} x{{ $item['quantity'] }}</span>
                            <span>${{ number_format($item['product']->price * $item['quantity'], 2) }}</span>
                        </div>
                    @endforeach
                    <div class="border-t pt-2 flex justify-between font-bold text-gray-900">
                        <span>Total</span>
                        <span>${{ number_format($total, 2) }}</span>
                    </div>
                </div>

                <div class="flex gap-3">
                    <a href="{{ route('payment.verify', ['id' => $result['data']['transaction_id'] ?? '', 'md5' => $result['data']['md5'] ?? '']) }}"
                       class="flex-1 text-center px-4 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-xl transition">
                        Verify Payment
                    </a>
                    <a href="{{ route('cart.index') }}"
                       class="flex-1 text-center px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl transition">
                        Back to Cart
                    </a>
                </div>
            @else
                <div class="text-center py-8">
                    <div class="text-gray-400 text-2xl mb-2">!</div>
                    <p class="text-gray-500">Failed to generate QR code.</p>
                    <p class="text-xs text-gray-400 mt-2">{{ $qrError ?? 'Please try again' }}</p>
                    <a href="{{ route('cart.index') }}" class="mt-4 inline-block px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl transition">Back to Cart</a>
                </div>
            @endif
        </div>
    </main>
</body>
</html>
