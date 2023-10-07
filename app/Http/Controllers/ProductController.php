<?php

namespace App\Http\Controllers;

use App\Models\Image;
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
        "image" => ["Required", "String", "max:255"],
        "quantity" => ["Required", "Integer", "min:0"],
        "description" => ["Required", "String", "max:255"]
    ];
    
    // views
    public function show(Request $request, Product $product): View
    {
        $image = Storage::url($product->image);

        return view("product.show", [
            "product" => $product,
            "role" => User::find(Auth::id())->role->name
        ]);
    }

    public function updateView(Request $request, Product $product): View
    {
        return view("product.update", [
            "product" => $product,
        ]);
    }

    public function storeView(Request $request): View
    {
        return view("product.store");
    }

    // 
    public function store(Request $request)
    {
        $request->validate($this->validation);

        $pro = Product::where("name", "=", $request->name)->first();

        if ($pro !== null)
        {
            return redirect()->route("product.store")->with("error", ["the name is used"]);
        }
        
        $image = Image::where("name", "=", $request->image)->first();
        
        $product = Product::create([
            "name" => $request->name,
            "price" => formatPrice($request->price),
            "quantity" => $request->quantity,
            "description" => $request->description
        ]);

        $product->images()->save($image);

        $product->save();

        return redirect()->route("product.show", ["product" => $product->id]);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate($this->validation);

        $product->update([
            "name" => $request->name,
            "price" => formatPrice($request->price),
            "quantity" => $request->quantity,
            "description" => $request->description
        ]);

        $product->images()->first()->delete();
        $image = Image::where("name", "=", $request->image)->first();
        $product->images()->save($image);
        
        return redirect()->route("product.show", ["product" => $product->id]);
    }

    public function delete(Request $request, Product $product): RedirectResponse
    {
        Storage::delete("public/" . $product->image);
        $product->delete();

        return redirect()->route("home");
    }
}
