<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;



    
    public function cart()
    {
        return $this->belongsToMany(Product::class, 'customer_product');
    }
}
