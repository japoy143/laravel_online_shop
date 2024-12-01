<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard();




        Gate::define("edit-product", function (User $user, Product $product) {

            $seller_id = $product->seller->user_id;
            return $seller_id == $user->id;
        });
    }
}
