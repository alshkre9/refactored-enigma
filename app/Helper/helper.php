<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

function formatPrice(int $number): string
{
    return '$' . number_format($number);
}

function getPrice(string $price): int
{
        return preg_replace("/([^0-9\\.])/i", "", $price);
}

function imageHandler(Request $request): string
{
    $filename = $request->name;
    $extension = pathinfo($request->image->getClientOriginalName(), PATHINFO_EXTENSION);
    $filename = str_replace(["_", " "], "-", trim($filename)) . "." . $extension;

    // store the image
    $img = Image::make($request->file("image")->getRealPath())->crop(512, 512)->save($filename, 100);
    Storage::put("public/" . $filename, $img);

    return $filename;
}