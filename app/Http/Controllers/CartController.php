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
        return view("cart.cart", ["cart" => json_decode($request->cookie("cart"), true) ?? [] ]);
    }

    public function store(Request $request, Product $product)
    {
        $request->validate($this->validation);

        $cart = [];
        if (($cart = $request->cookie("cart")))
        {
            $cart = json_decode($cart, true);
        }
        $cart[$product->id] = [
            "name" => $product->name,
            "quantity" => $request->quantity,
            "price" => $product->price,
            "total" => $product->price * $request->quantity
        ];
        $cart = json_encode($cart);
        $cookie = new Cookie("cart", $cart);
        return response("cookies was set")->cookie($cookie);
    }

    public function delete(Request $request)
    {
        // Cookie::expire('cart');
        return response("cookies was deleted")->withoutCookie("cart");
    }
}
