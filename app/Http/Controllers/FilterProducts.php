<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductTag;
use Illuminate\Http\Request;

class FilterProducts extends Controller
{
    public function sortByTag(string $tag)
    {
        $productTag = ProductTag::where("name", '=', $tag)->first();
        $products = $productTag->products;



        return view('filters.sortbytag', ["tagname" => $tag, "products" => $products]);
    }
}
