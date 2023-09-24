<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    private array $validation = [
        "name" => ["Required", "String", "max:255"],
        "price" => ["Required", "Integer", "min:0"],
        "image" => ["Required", "Image"],
        "quantity" => ["Required", "Integer", "min:0"],
        "description" => ["Required", "String", "max:255"]
    ];

    /**
     * store image in a directory and return filename to store
     */
    private function imageHandler(Request $request): string
    {
        $filename = $request->name;
        $extension = pathinfo($request->image->getClientOriginalName(), PATHINFO_EXTENSION);
        $filename = str_replace(["_", " "], "-", trim($filename)) . "." . $extension;
        $request->image->storeAs("public", $filename);
        return $filename;
    }
    
    public function landing(Request $request): View
    {   
        return view("landing", ["products" => Product::all()]);
    }
    
    public function show(Request $request, Product $product): View
    {
        $image = Storage::url($product->image);

        return view("product.show", [
            "id" => $product->id,
            "name" => $product->name, 
            "price" => $product->price,
            "image" => asset($image),
            "quantity" => $product->quantity,
            "description" => $product->description,
            "max" => $product->quantity
        ]);
    }
    
    public function storeView(Request $request): View
    {
        return view("product.store");
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate($this->validation);

        $product = Product::create([
            "name" => $request->name,
            "price" => formatPrice($request->price),
            "image" => $this->imageHandler($request),
            "quantity" => $request->quantity,
            "description" => $request->description
        ]);

        $product->save();

        return redirect()->route("product", ["product" => $product->id]);
    }
    
    public function updateView(Request $request, Product $product): View
    {
        return view("product.update", ["product" => $product->id]);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate($this->validation);

        $product->update([
            "name" => $request->name,
            "price" => formatPrice($request->price),
            "image" => $this->imageHandler($request),
            "quantity" => $request->quantity,
            "description" => $request->description
        ]);

        $product->save();

        return redirect()->route("product", ["product" => $product->id]);
    }

    public function delete(Request $request, Product $product): RedirectResponse
    {
        Storage::delete("public/" . $product->image);
        $product->delete();

        return redirect()->route("home");
    }
}
