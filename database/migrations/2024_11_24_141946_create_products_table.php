<?php

use App\Models\Admin;
use App\Models\Customer;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\Seller;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Seller::class);
            $table->string('productname');
            $table->json('category');
            $table->string('price');
            $table->string('description');
            $table->string('imageUrl');
            $table->integer('stocks');
            $table->json('ratings')->nullable();
            $table->timestamps();
        });

        //pivot table
        // Schema::create('seller_products', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignIdFor(Seller::class)->constrained()->cascadeOnDelete();
        //     $table->foreignIdFor(Product::class)->constrained()->cascadeOnDelete();
        //     $table->timestamps();
        // });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
