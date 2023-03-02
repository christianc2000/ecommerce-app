<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WelcomeController;
use App\Http\Livewire\ShoppingCart;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', WelcomeController::class);
Route::get('categories/{category}',[CategoryController::class,'show'])->name('categories.show');
Route::get('products/{product}',[ProductController::class,'show'])->name('product.show');
Route::get('search',SearchController::class)->name('search');
Route::get('shopping-cart', ShoppingCart::class)->name('shopping-cart');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//prueba limpiando carrito
Route::get('prueba',function(){
   Cart::destroy();
});