<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $cast = [
        "category" => array(),
        "ratings" => array(),
    ];

    public function seller()
    {
        return $this->belongsToMany(Seller::class, 'seller_products');
    }
}
