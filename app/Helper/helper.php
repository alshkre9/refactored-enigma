<?php

function formatPrice(int $number): string
{
    return '$' . number_format($number);
}

function getPrice(string $price): int
{
        return preg_replace("/([^0-9\\.])/i", "", $price);
}