<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $products = [
            [
                "productname" => "Vans",
                "category" => json_encode(["Shoes", "Vintage"]),
                "price" => "400",
                "description" => "Lorem ipsum Lorem ipsum",
                "imageUrl" => "Products/shoes1.jpg",
                "stocks" => 20,

            ],
            [
                "productname" => "Nike",
                "category" => json_encode(["Shoes", "Vintage"]),
                "price" => "500",
                "description" => "Lorem ipsum Lorem ipsum",
                "imageUrl" => "Products/shoes2.jpg",
                "stocks" => 20,

            ],
            [
                "productname" => "Gucci",
                "category" => json_encode(["Bag", "Vintage"]),
                "price" => "1400",
                "description" => "Lorem ipsum Lorem ipsum",
                "imageUrl" => "Products/bag1.jpg",
                "stocks" => 20,

            ],
            [
                "productname" => "Channel",
                "category" => json_encode(["Bag", "Vintage"]),
                "price" => "700",
                "description" => "Lorem ipsum Lorem ipsum",
                "imageUrl" => "Products/bag1.jpg",
                "stocks" => 20,

            ],
            [
                "productname" => "Realme",
                "category" => json_encode(["Phone", "Electronics"]),
                "price" => "500",
                "description" => "Lorem ipsum Lorem ipsum",
                "imageUrl" => "Products/cellphone1.jpg",
                "stocks" => 20,

            ],
            [
                "productname" => "Iphone",
                "category" => json_encode(["Phone", "Electronics"]),
                "price" => "1000",
                "description" => "Lorem ipsum Lorem ipsum",
                "imageUrl" => "Products/cellphone2.jpg",
                "stocks" => 20,

            ],
            [
                "productname" => "JBL",
                "category" => json_encode(["Headphones", "Electronics"]),
                "price" => "800",
                "description" => "Lorem ipsum Lorem ipsum",
                "imageUrl" => "Products/headphone1.jpg",
                "stocks" => 20,

            ],
            [
                "productname" => "Skull Candy",
                "category" => json_encode(["Headphones", "Electronics"]),
                "price" => "750",
                "description" => "Lorem ipsum Lorem ipsum",
                "imageUrl" => "Products/headphone2.jpg",
                "stocks" => 20,

            ],
            [
                "productname" => "Macbook air 1",
                "category" => json_encode(["Laptop", "Electronics"]),
                "price" => "1040",
                "description" => "Lorem ipsum Lorem ipsum",
                "imageUrl" => "Products/laptop2.jpg",
                "stocks" => 20,

            ],
            [
                "productname" => "Macbook",
                "category" => json_encode(["Laptop", "Electronics"]),
                "price" => "750",
                "description" => "Lorem ipsum Lorem ipsum",
                "imageUrl" => "Products/laptop2.jpg",
                "stocks" => 20,

            ],
        ];

        for ($x = 0; $x <= 20; $x++) {
            $randomKey = array_rand(array_keys($products), 1); // get all the keys or indexes and randomize it
            $randomProduct = $products[$randomKey];
            $mergeData = array_merge($randomProduct, ["seller_id" => 1]);
            $product =  \App\Models\Product::create($mergeData);

            $allcategory = json_decode($product->category, true);


            foreach ($allcategory as $eachCategory) {
                $productTag = \App\Models\ProductTag::firstOrCreate(["name" => $eachCategory]);
                $product->producttags()->attach($productTag->id);
            }
        }


        //pivot
        // for ($x = 0; $x <= 20; $x++) {
        //     $randomKey = array_rand(array_keys($products), 1); // get all the keys or indexes and randomize it
        //     $randomProduct = $products[$randomKey];
        //     $product =   \App\Models\Product::create($randomProduct);
        //     if ($x >= 10) {
        //         $seller = \App\Models\Seller::find(1);
        //         $seller->products()->attach($product->id);
        //     } else {
        //         $seller = \App\Models\Seller::find(2);
        //         $seller->products()->attach($product->id);
        //     }
        // }
    }
}
