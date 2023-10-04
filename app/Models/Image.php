<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Product;

class Image extends Model
{
    use HasFactory;

    /**
    * @var bool
    */
    public $timestamps = false;

    protected $guarded  = [
        "name"
    ];

    public function product(): HasOne
    {
        return $this->hasOne(Product::class);
    }
}
