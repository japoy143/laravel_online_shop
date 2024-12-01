<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\ProductTag;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $products = Product::with('producttags')->get();


        return view("welcome", ["products" => $products]);
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
            "stocks" => ["required", "int"],
            "imageUrl" => ["required", File::types(["jpeg", "jpg", "png", "svg"])->max(12 * 1024)], // reference https://laravel.com/docs/11.x/validation#rule-max-digits //Validating Files

        ]);

        //find the seller
        $seller = Seller::findOrFail($user->id);

        $categories = explode(",", $request->category);

        $productImagePath = $request->imageUrl->store('Products');

        $attributes['category'] = json_encode($categories);
        $attributes['imageUrl'] = $productImagePath;
        $attributes['ratings'] = json_encode($request->ratings);
        $attributes['seller_id'] = $seller->user_id;

        $product =   Product::create($attributes);

        foreach ($categories as $category) {
            $productTag = ProductTag::firstOrCreate(['name' => $category]);

            $product->producttags()->attach($productTag->id);
        }


        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $seller = Seller::findOrFail($user->id);
        $products = $seller->products()->get();
        $auth_user = Auth::user();
        if ($user->id != $auth_user->id) {
            abort(401);
        }
        return view('dashboard.seller-products', ["products" => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */



    public function edit(Product $product)
    {
        return view('dashboard.edit-products', ['product' => $product]);
    }




    public function update(Product $product, Request $request)
    {
        //validate
        $attributes = $request->validate([
            "productname" => ['required', 'string'],
            "category" => ["required", 'string'],
            "price" => ['required', 'string'],
            "description" => ["required", "string"],
            "stocks" => ["required", "int"],


        ]);

        $categories = explode(",", $request->category);
        $attributes["category"] = json_encode($categories);


        //validation for image
        if ($request->hasFile("imageUrl")) {
            $request->validate([
                "imageUrl" => ["required", File::types(["jpeg", "jpg", "png", "svg"])->max(12 * 1024)],
            ]);

            $imagePath = $request->imageUrl->store("Products");
            $attributes = array_merge($attributes, ["imageUrl" => $imagePath]);   // add or insert value
        }




        //update
        Product::findOrFail($product->id)->update($attributes);

        //redirect
        return redirect(route("seller.products", Auth::user()->id));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        $product->delete();
        return redirect(route("seller.products", Auth::user()->id));
    }
}
