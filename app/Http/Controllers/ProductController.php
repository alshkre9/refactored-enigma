<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request): View
    {   
        return view("landing", ["name" => "hi"]);
    }

    public function show(Request $request, Product $product): View
    {
        return view("product");
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => ["Required", "String", "max:255"],
            "image" => ["Required", "String", "max:255"],
            "quantity" => ["Required", "Integer", "min:0"],
            "description" => ["Required", "String", "max:255"]
        ]);

        $product = Product::create([
            "name" => $request->name,
            "image" => $request->image,
            "quantity" => $request->quantity,
            "description" => $request->description
        ]);

        $product->save();

        return redirect()->route("product", ["product" => $product->id]);
    }

    public function update(Request $request, Product $product)
    {
        return view
    }
}
