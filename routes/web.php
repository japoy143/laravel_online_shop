<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FilterProducts;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Sampleroute;
use App\Http\Livewire\SellerProducts;
use App\Models\Seller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProductController::class, 'index'])->name('home');




Route::middleware('auth')->group(function () {
    //User Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    

    //Products
    Route::get('/addproducts', [ProductController::class, 'create'])->name('addproducts');
    Route::post('/addproducts/{user}', [ProductController::class, 'store'])->name('addproducts.store');
    Route::get('/myproducts/{user}', SellerProducts::class)->name('seller.products');

    Route::get('/manageproducts/{product}', [ProductController::class, 'edit'])->name('manageproducts')->middleware('can:edit-product,product');
    Route::patch('/manageproducts/{product}', [ProductController::class, 'update'])->name('manageproducts.update')->middleware('can:edit-product,product');
    Route::delete('/deleteproduct/{product}', [ProductController::class, 'destroy'])->name('deleteproduct');

    //filter
    Route::get('/filterbytag/{tag}', [FilterProducts::class, 'sortByTag'])->name('sortTag');

    //Customer
    Route::post('/addtocart/{product}', [CustomerController::class, 'cart'])->name('cart');
});

require __DIR__ . '/auth.php';
