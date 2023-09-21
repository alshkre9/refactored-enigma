<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchases;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchasesController extends Controller
{
    public function store(Request $request)
    {
        $user = User::find(Auth::id());
        foreach (json_decode($request->cookie("cart")) as $product)
        {
            // create purchase record
        }        

        return redirect()->route("cart");
    }
}
