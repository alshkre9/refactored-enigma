<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function store(Request $request)
    {
        $user = User::find(Auth::id());
        foreach (json_decode($request->cookie("cart")) as $key => $product)
        {
            $product = Product::find($key);
            Purchase::create([
                "price" => $product["price"],
                "quantity" =>  $product["quantity"],
                "total" => $product["total"]
            ]);


        }        
    }
}
