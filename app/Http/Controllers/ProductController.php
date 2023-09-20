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
        "image" => ["Required", "Image"],
        "quantity" => ["Required", "Integer", "min:0"],
        "description" => ["Required", "String", "max:255"]
    ];

    /**
     * store image in $dir directory and return filename to store
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
        return view("landing");
    }
    
    public function show(Request $request, Product $product): View
    {
        $image = Storage::url($product->image);

        return view("product.show", [
            "name" => $product->name, 
            "image" => asset($image),
            "quantity" => $product->quantity,
            "description" => $product->description
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

        return back();
    }
}
