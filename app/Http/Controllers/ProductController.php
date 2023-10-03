<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    private array $validation = [
        "name" => ["Required", "String", "max:255"],
        "price" => ["Required", "Integer", "min:0"],
        "image" => ["Required", "Image"],
        "quantity" => ["Required", "Integer", "min:0"],
        "description" => ["Required", "String", "max:255"]
    ];

    private array $validation_update = [
        "name" => ["Required", "String", "max:255"],
        "price" => ["Required", "Integer", "min:0"],
        "quantity" => ["Required", "Integer", "min:0"],
        "description" => ["Required", "String", "max:255"]
    ];

    public function landing(Request $request): View
    {   
        return view("landing", ["products" => Product::all(), "role" => "admin"]);
    }
    
    public function show(Request $request, Product $product): View
    {
        $image = Storage::url($product->image);

        return view("product.show", [
            "product" => $product,
            "type" => "show",
        ]);
    }
    
    public function storeView(Request $request): View
    {
        return view("product.store", ["error" => session("error") ?? [], "type" => "store"]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate($this->validation);

        $pro = Product::where("name", "=", $request->name)->first();

        if ($pro !== null)
        {
            return redirect()->route("product.store")->with("error", ["the name is used"]);
        }
        
        $product = Product::create([
            "name" => $request->name,
            "price" => formatPrice($request->price),
            "image" => imageHandler($request),
            "quantity" => $request->quantity,
            "description" => $request->description
        ]);

        $product->save();

        return redirect()->route("product.show", ["product" => $product->id]);
    }
    
    public function updateView(Request $request, Product $product): View
    {
        return view("product.update", ["product" => $product, "type" => "update"]);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate($this->validation_update);

        $product->update([
            "name" => $request->name,
            "price" => formatPrice($request->price),
            "quantity" => $request->quantity,
            "description" => $request->description
        ]);

        $product->save();

        return redirect()->route("product.show", ["product" => $product->id]);
    }

    public function delete(Request $request, Product $product): RedirectResponse
    {
        Storage::delete("public/" . $product->image);
        $product->delete();

        return redirect()->route("home");
    }

    public function storeImage(Request $request)
    {
        return asset(Storage::url(imageHandler($request)));
    }
}
