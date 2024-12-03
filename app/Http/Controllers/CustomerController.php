<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function cart(Product $product)
    {
        //all products
        $products = Product::with('producttags')->get();

        //find the customer using id
        $customer = Auth::user()->customer->id;

        //check if customer already added it to its cart
        $isCustomerAddedProduct = $product->customer->first->user_id;

        //prevent duplication
        if ($isCustomerAddedProduct != null) {

            return back();
        } else {
            //then attach it to the customer using product id
            $product->customer()->attach($customer);
            //redirect or stay in page
            return back();
        }
    }
}
