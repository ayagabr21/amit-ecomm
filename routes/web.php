<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\FrontendController;



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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index'])->name('index');
Route::get('/category', [App\Http\Controllers\Frontend\FrontendController::class, 'category'])->name('category');
Route::get('view-category/{slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewcategory'])->name('viewcategory');
Route::get('category/{cate_slug}/{prod_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewproduct'])->name('viewproduct');
Route::get('product-list', [App\Http\Controllers\Frontend\FrontendController::class, 'productListajax'])->name('productListajax');
Route::post('searchproduct', [App\Http\Controllers\Frontend\FrontendController::class, 'searchproduct'])->name('searchproduct');



Auth::routes();
Route::post('add-to-cart',[CartController::class,'addProduct'])->name('add-to-cart');
Route::post('delete-cart-Item',[CartController::class,'dleteProduct'])->name('add-to-cart');

Route::middleware(['auth'])->group(function(){
Route::get('cart',[CartController::class,'viewCart'])->name('viewCart');

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // category
    Route::get('categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('add-categories', [CategoryController::class, 'add'])->name('add-category');
    Route::post('insert-categories', [CategoryController::class,'insert'])->name('insert-categories');
    Route::get('edit-product/{id}',[CategoryController::class,'edit'])->name('edit-product');
    Route::put('update-category/{id}',[CategoryController::class,'update'])->name('update-category');
    Route::get('delete-category/{id}',[CategoryController::class,'destroy'])->name('delete-category');

    // products
    Route::get('products', [ProductController::class, 'index'])->name('products');
    Route::get('add-products', [ProductController::class, 'add'])->name('add-products');
    Route::post('insert-products', [ProductController::class, 'insert'])->name('insert-products');
    Route::get('edit-products/{id}',[ProductController::class, 'edit'])->name('edit-products');
    Route::PUT('update-products/{id}',[ProductController::class, 'update'])->name('update-products');
    Route::get('delete-products/{id}',[ProductController::class,'destroy'])->name('delete-products');

 
    // Route::resource('');
});
