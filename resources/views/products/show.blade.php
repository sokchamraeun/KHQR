<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $product->name }}</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            *,:before,:after{--tw-border-style:solid;--tw-font-weight:initial;--tw-shadow:0 0 #0000;--tw-shadow-color:initial;--tw-shadow-alpha:100%;--tw-inset-shadow:0 0 #0000;--tw-inset-shadow-color:initial;--tw-inset-shadow-alpha:100%;--tw-ring-color:initial;--tw-ring-shadow:0 0 #0000;--tw-inset-ring-color:initial;--tw-inset-ring-shadow:0 0 #0000;--tw-ring-inset:initial;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-offset-shadow:0 0 #0000;--tw-translate-x:0;--tw-translate-y:0;--tw-translate-z:0;--tw-rotate-x:initial;--tw-rotate-y:initial;--tw-rotate-z:initial;--tw-skew-x:initial;--tw-skew-y:initial;--tw-space-x-reverse:0;--tw-blur:initial;--tw-brightness:initial;--tw-contrast:initial;--tw-grayscale:initial;--tw-hue-rotate:initial;--tw-invert:initial;--tw-opacity:initial;--tw-saturate:initial;--tw-sepia:initial;--tw-drop-shadow:initial;--tw-drop-shadow-color:initial;--tw-drop-shadow-alpha:100%;--tw-drop-shadow-size:initial;--tw-duration:initial;--tw-ease:initial;--tw-content:""}*,:before,:after{box-sizing:border-box;border-width:0;border-style:solid;border-color:oklch(92.6% .006 286.033)}:before,:after{--tw-content:""}html,:host{line-height:1.5;-webkit-text-size-adjust:100%;tab-size:4;font-family:"Instrument Sans",ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-feature-settings:normal;font-variation-settings:normal;-webkit-tap-highlight-color:transparent}body{margin:0;line-height:inherit}h1,h2,p{margin:0}a{color:inherit;text-decoration:inherit}button,input{font-family:inherit;font-feature-settings:inherit;font-variation-settings:inherit;font-size:100%;font-weight:inherit;line-height:inherit;letter-spacing:inherit;color:inherit;margin:0;padding:0}button{cursor:pointer}:root{--font-sans:"Instrument Sans",ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";--color-white:#fff;--color-gray-50:oklch(98.5% .002 247.839);--color-gray-100:oklch(96.7% .003 264.542);--color-gray-200:oklch(92.8% .006 264.531);--color-gray-500:oklch(55.1% .027 264.364);--color-gray-600:oklch(44.6% .03 256.802);--color-gray-700:oklch(37.3% .034 259.733);--color-gray-800:oklch(27.8% .033 256.848);--color-gray-900:oklch(21% .034 264.665);--color-blue-500:oklch(62.3% .214 259.815);--color-blue-600:oklch(54.6% .245 262.881);--color-blue-700:oklch(48.8% .243 264.376);--spacing:.25rem;--text-sm:.875rem;--text-sm--line-height:1.25rem;--text-base:1rem;--text-base--line-height:1.5rem;--text-lg:1.125rem;--text-lg--line-height:1.5rem;--text-2xl:1.5rem;--text-2xl--line-height:1.75rem;--text-3xl:1.875rem;--text-3xl--line-height:2.25rem;--font-weight-medium:500;--font-weight-semibold:600;--font-weight-bold:700;--radius-lg:.5rem;--radius-xl:.75rem;--radius-2xl:1rem;--shadow-sm:0 1px 3px 0 #0000001a;--shadow-md:0 4px 6px -1px #0000001a;--shadow-lg:0 10px 15px -3px #0000001a}
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

    <main class="flex-1 max-w-4xl mx-auto w-full px-4 py-8">
        <a href="{{ route('products.index') }}" class="text-sm text-blue-600 hover:underline mb-4 inline-block">&larr; Back</a>

        <div class="bg-white rounded-2xl shadow-md overflow-hidden">
            <div class="h-64 bg-gray-100 flex items-center justify-center text-gray-400">
                @if ($product->image)
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                @else
                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                @endif
            </div>
            <div class="p-6">
                <h1 class="text-3xl font-bold">{{ $product->name }}</h1>
                <p class="text-2xl font-bold text-blue-600 mt-2">${{ number_format($product->price, 2) }}</p>
                <p class="text-gray-600 mt-4 leading-relaxed">{{ $product->description }}</p>
                <p class="text-sm text-gray-400 mt-2">Stock: {{ $product->stock }}</p>

                <form method="POST" action="{{ route('cart.add', $product) }}" class="mt-6 flex items-center gap-3">
                    @csrf
                    <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="w-20 px-3 py-2 border border-gray-300 rounded-lg text-center">
                    <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition">Add to Cart</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
