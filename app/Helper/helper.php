<?php

function formatPrice(int $number): string
{
    return '$' . number_format($number);
}