<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function addToCart(Request $request, Product $product)
    {
        $quantity = max(1, (int) $request->quantity);
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            $cart[$product->id] = ['quantity' => $quantity];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Added to cart');
    }

    public function cart()
    {
        $cart = session()->get('cart', []);
        $ids = array_keys($cart);
        $products = Product::whereIn('id', $ids)->get()->keyBy('id');
        $total = 0;
        $items = [];

        foreach ($cart as $id => $item) {
            $product = $products->get($id);
            if (!$product) continue;
            $qty = $item['quantity'];
            $total += $product->price * $qty;
            $items[$id] = ['product' => $product, 'quantity' => $qty];
        }

        return view('cart.index', compact('items', 'total'));
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);
        return back()->with('success', 'Removed from cart');
    }
}
