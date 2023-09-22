<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Cookie;

class PurchaseController extends Controller
{
    public function store(Request $request)
    {
        $user = User::find(Auth::id());
        $cart = json_decode($request->cookie("cart"), true);
        foreach ($cart ?? [] as $key => $value)
        {
            $product = Product::find($key);
            
            if (!$product || ($product->quantity < $value))
            {
                unset($cart[$key]);
                $cookie = new Cookie("cart", json_encode($cart));
                return redirect()->route("cart")->withCookie($cookie);
            }
            $purchase = Purchase::create([
                "quantity" =>  $value,
            ]);
            // add relationship
            $user->purchases()->save($purchase);
            $product->purchases()->save($purchase);
        }        

        return redirect()->route("cart")->withoutCookie("cart");
    }
}
