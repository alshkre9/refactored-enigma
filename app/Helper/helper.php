<?php

use Illuminate\Http\Request;

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
    $request->image->storeAs("public", $filename);
    return $filename;
}