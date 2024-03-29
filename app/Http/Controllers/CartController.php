<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Cookie;

class CartController extends Controller
{
    private array $validation = [
        "quantity" => ["Required", "Integer", "min:0"]
    ];
    
    public function show(Request $request): View
    {
        $productsMock = [];
        $cart = json_decode($request->cookie("cart"), true);
        foreach($cart ?? [] as $key => $value)
        {
            $productsMock[] = [Product::find($key), $value];
        }
        return view("cart.cart", ["cart" => $productsMock]);
    }

    public function store(Request $request, Product $product)
    {
        $request->validate($this->validation + ["max:{$product->quantity}"]);

        $cart = [];
        if (($cart = $request->cookie("cart")))
        {
            $cart = json_decode($cart, true);
        }
        $cart[$product->id] = $request->quantity;
        $cart = json_encode($cart);
        $cookie = new Cookie("cart", $cart);

        return redirect()->route("cart.show")->cookie($cookie);
    }

    public function delete(Request $request)
    {
        // Cookie::expire('cart');
        return redirect()->route("cart.show")->withoutCookie("cart");
    }

    public function remove(Request $request, Product $product)
    {
        $cart = json_decode($request->cookie("cart"), true);
        unset($cart[$product->id]);
        $cookie = new Cookie("cart", json_encode($cart));
        return redirect()->route("cart.show")->withCookie($cookie);
    }
}
