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
        return $this->belongsTo(Seller::class,);
    }


    public function customer()
    {
        return $this->belongsToMany(Customer::class, "customer_product");
    }


    public function producttags()
    {
        return $this->belongsToMany(ProductTag::class, "producttag_product");
    }
}
