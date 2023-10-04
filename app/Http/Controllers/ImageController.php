<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class ImageController extends Controller
{
    private array $validation = [
        "image" => ["Required", "Image"]
    ];
    
    public function __invoke(Request $request): string
    {
        $request->validate($this->validation);

        $image = \App\Models\Image::create([]);
        
        $filename = $image->id;
        $extension = pathinfo($request->image->getClientOriginalName(), PATHINFO_EXTENSION);
        $filename = str_replace(["_", " "], "-", trim($filename)) . "." . $extension;
        
        // store the image
        $img = Image::make($request->file("image")->getRealPath());

        // crop it and resize it
        if ($img->getWidth() > $img->getHeight())
        {
            $img->crop($img->getWidth(), $img->getWidth());
        }
        else if ($img->getWidth() < $img->getHeight())
        {
            $img->crop($img->getHeight(), $img->getHeight());
        }
        $img->resize(512, 512)->save($filename, 100);

        Storage::put("public/" . $filename, $img);

        $image->name = $filename;
        $image->save();
        return $filename;
    }
}
