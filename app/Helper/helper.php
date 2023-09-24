<?php

function formatPrice(int $number): string
{
    return '$' . number_format($number);
}

function getPrice(string $price): int
{
    return (int) str_replace("$", "", $price);
}