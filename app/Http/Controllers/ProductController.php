<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.addproducts");
    }

    /**
     * Store a newly created resource in storage.
     *

     * @return \Illuminate\Http\Response
     */
    public function store(User $user, Request $request)
    {

        $attributes =  $request->validate([
            "productname" => ['required', 'string'],
            "category" => ["required", 'string'],
            "price" => ['required', 'string'],
            "description" => ["required", "string"],
            "imageUrl" => ["required", File::types(["jpeg", "jpg", "png", "svg"])->max(12 * 1024)], // reference https://laravel.com/docs/11.x/validation#rule-max-digits //Validating Files

        ]);


        $categories = explode(",", $request->category);

        $productImagePath = $request->imageUrl->store('Products');

        $attributes['category'] = json_encode($categories);
        $attributes['imageUrl'] = $productImagePath;
        $attributes['ratings'] = json_encode($request->ratings);

        $product  = Product::create($attributes);

        //Attach seller to the product

        //Find the seller using the id
        $seller = Seller::findOrFail($user->id);

        //Attach the product using the products method in seller
        $seller->products()->attach($product); // if does not work use id


        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
