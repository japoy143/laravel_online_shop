<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;



    public function products(){
        return $this->belongsToMany(Product::class, 'seller_products'); // must be the name of the pivot table when the name doesnt fit to the naming convention
    }
}
