<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "image",
        "price",
        "quantity",
        "description"
    ];

    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class);
    }
}
