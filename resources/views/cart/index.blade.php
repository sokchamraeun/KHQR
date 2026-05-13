<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shopping Cart</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            *,:before,:after{--tw-border-style:solid;--tw-font-weight:initial;--tw-shadow:0 0 #0000;--tw-shadow-color:initial;--tw-shadow-alpha:100%;--tw-inset-shadow:0 0 #0000;--tw-inset-shadow-color:initial;--tw-inset-shadow-alpha:100%;--tw-ring-color:initial;--tw-ring-shadow:0 0 #0000;--tw-inset-ring-color:initial;--tw-inset-ring-shadow:0 0 #0000;--tw-ring-inset:initial;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-offset-shadow:0 0 #0000;--tw-translate-x:0;--tw-translate-y:0;--tw-translate-z:0;--tw-rotate-x:initial;--tw-rotate-y:initial;--tw-rotate-z:initial;--tw-skew-x:initial;--tw-skew-y:initial;--tw-space-x-reverse:0;--tw-blur:initial;--tw-brightness:initial;--tw-contrast:initial;--tw-grayscale:initial;--tw-hue-rotate:initial;--tw-invert:initial;--tw-opacity:initial;--tw-saturate:initial;--tw-sepia:initial;--tw-drop-shadow:initial;--tw-drop-shadow-color:initial;--tw-drop-shadow-alpha:100%;--tw-drop-shadow-size:initial;--tw-duration:initial;--tw-ease:initial;--tw-content:""}*,:before,:after{box-sizing:border-box;border-width:0;border-style:solid;border-color:oklch(92.6% .006 286.033)}:before,:after{--tw-content:""}html,:host{line-height:1.5;-webkit-text-size-adjust:100%;tab-size:4;font-family:"Instrument Sans",ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"}body{margin:0;line-height:inherit}h1,h2,p,ul{margin:0}ul{padding:0;list-style:none}a{color:inherit;text-decoration:inherit}button{font-family:inherit;font-feature-settings:inherit;font-variation-settings:inherit;font-size:100%;font-weight:inherit;line-height:inherit;letter-spacing:inherit;color:inherit;margin:0;padding:0}button{cursor:pointer}:root{--font-sans:"Instrument Sans",ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";--color-white:#fff;--color-gray-50:oklch(98.5% .002 247.839);--color-gray-100:oklch(96.7% .003 264.542);--color-gray-200:oklch(92.8% .006 264.531);--color-gray-300:oklch(87.2% .01 258.338);--color-gray-400:oklch(70.7% .022 261.325);--color-gray-500:oklch(55.1% .027 264.364);--color-gray-600:oklch(44.6% .03 256.802);--color-gray-700:oklch(37.3% .034 259.733);--color-gray-800:oklch(27.8% .033 256.848);--color-gray-900:oklch(21% .034 264.665);--color-blue-500:oklch(62.3% .214 259.815);--color-blue-600:oklch(54.6% .245 262.881);--color-blue-700:oklch(48.8% .243 264.376);--color-green-100:oklch(96.2% .044 156.743);--color-green-600:oklch(62.7% .194 149.214);--color-green-700:oklch(52.7% .154 150.069);--color-red-100:oklch(93.6% .032 17.717);--color-red-500:oklch(63.7% .237 25.331);--color-red-600:oklch(57.7% .245 27.325);--spacing:.25rem;--text-xs:.75rem;--text-xs--line-height:1rem;--text-sm:.875rem;--text-sm--line-height:1.25rem;--text-base:1rem;--text-base--line-height:1.5rem;--text-lg:1.125rem;--text-lg--line-height:1.5rem;--text-xl:1.25rem;--text-xl--line-height:1.75rem;--text-2xl:1.5rem;--text-2xl--line-height:1.75rem;--font-weight-medium:500;--font-weight-semibold:600;--font-weight-bold:700;--tracking-tight:-.025em;--radius:.25rem;--radius-lg:.5rem;--radius-xl:.75rem;--radius-2xl:1rem;--shadow-sm:0 1px 3px 0 #0000001a;--shadow-md:0 4px 6px -1px #0000001a;--shadow-lg:0 10px 15px -3px #0000001a}
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

    <main class="flex-1 max-w-3xl mx-auto w-full px-4 py-8">
        <h1 class="text-2xl font-bold tracking-tight mb-6">Shopping Cart</h1>

        @if (session('success'))
            <div class="mb-4 px-4 py-3 bg-green-100 text-green-700 rounded-lg text-sm">{{ session('success') }}</div>
        @endif

        @if (empty($items))
            <div class="text-center py-20 text-gray-400">
                <p class="text-xl">Your cart is empty</p>
                <a href="{{ route('products.index') }}" class="mt-4 inline-block px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition">Browse Products</a>
            </div>
        @else
            <div class="space-y-4">
                @foreach ($items as $id => $item)
                    <div class="bg-white rounded-xl shadow-sm p-4 flex items-center justify-between">
                        <div class="flex-1">
                            <h2 class="font-semibold">{{ $item['product']->name }}</h2>
                            <p class="text-sm text-gray-500">${{ number_format($item['product']->price, 2) }} x {{ $item['quantity'] }}</p>
                        </div>
                        <div class="text-right mr-4">
                            <p class="font-bold">${{ number_format($item['product']->price * $item['quantity'], 2) }}</p>
                        </div>
                        <form method="POST" action="{{ route('cart.remove', $id) }}">
                            @csrf
                            <button type="submit" class="text-sm text-red-500 hover:text-red-600">Remove</button>
                        </form>
                    </div>
                @endforeach
            </div>

            <div class="mt-6 bg-white rounded-xl shadow-sm p-4">
                <div class="flex justify-between items-center">
                    <span class="text-lg font-semibold">Total</span>
                    <span class="text-2xl font-bold">${{ number_format($total, 2) }}</span>
                </div>
                <a href="{{ route('checkout.index') }}" class="mt-4 block w-full text-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition">Proceed to Checkout</a>
            </div>
        @endif
    </main>
</body>
</html>
