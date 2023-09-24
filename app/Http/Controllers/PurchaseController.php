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
            
            if (!$product || ($product->quantity < $value) || getPrice($user->amount) < (getPrice($product->price) * $value))
            {
                unset($cart[$key]);
                $cookie = new Cookie("cart", json_encode($cart));
                return redirect()->route("cart")->withCookie($cookie);
            }

            $purchase = Purchase::create([
                "quantity" =>  $value,
                "price" => $product->price
            ]);

            // add relationship
            $user->purchases()->save($purchase);
            $product->purchases()->save($purchase);

            // change price values
            $product->quantity = $product->quantity - $value;
            $user->amount = formatPrice(getPrice($user->amount) - (getPrice($product->price) * $value));
    
            $user->save();
            $product->save();
        }        

        return redirect()->route("cart")->withoutCookie("cart");
    }
}
