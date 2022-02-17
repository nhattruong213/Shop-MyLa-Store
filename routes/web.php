<?php

use App\Http\Controllers\Dashboard\AdminCategoryController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckOutController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ShopController;
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

Route::get('/',[HomeController::class, 'index'])->name('homepage');


// route for shop 
Route::prefix('shop')->group(function(){

    Route::get('/product/{id}',[ShopController::class, 'show'])->name('productDetail');
    Route::post('/product/{id}',[ShopController::class, 'postComment'])->name('postComment');
    Route::get('/',[ShopController::class, 'index'])->name('shop');
    Route::get('/{id}',[ShopController::class, 'category'])->name('shop.category');

});

//route for contact
Route::get('/contact',[ContactController::class, 'index'])->name('contact');

//route for blog
Route::prefix('blog')->group(function(){
    Route::get('/',[BlogController::class, 'index'])->name('blog');
    Route::get('/blogDetail/{id}',[BlogController::class, 'show'])->name('blogDetail');
});

//route for cart
Route::prefix('Cart')->group(function(){
    Route::get('/AddCart/{id}',[CartController::class, 'AddCart'])->name('AddCart');
    Route::post('/AddCart/Product/{id}',[CartController::class, 'AddCart'])->name('AddCart-Many');
    Route::get('/',[CartController::class, 'index'])->name('cart');
    Route::get('/DeleteItemCart/{id}',[CartController::class, 'DeleteItemCart'])->name('DeleteItemCart');
    Route::get('/DeleteListCart/{id}',[CartController::class, 'DeleteListCart'])->name('DeleteListCart');
    Route::get('/DeleteAllCart',[CartController::class, 'DeleteAllCart'])->name('DeleteAllCart');
    Route::get('/UpdateItemCart/{id}/{quanty}',[CartController::class, 'UpdateItemCart'])->name('UpdateItemCart');
});

//route for checkout
Route::prefix('CheckOut')->group(function(){
    Route::get('/',[CheckOutController::class, 'index'])->name('CheckOut');
    Route::post('/AddOrder',[CheckOutController::class, 'addOrder'])->name('addOrder');
});

// route for admin
Route::prefix('admin')->group(function(){
    Route::get('/',[AdminController::class, 'ShowDashBoard'])->name('PageAdmin');
    Route::get('/login',[AdminController::class, 'index'])->name('ShowLogin');
    route::post('/login',[AdminController::class, 'login'])->name('login');
    route::get('/logout',[AdminController::class, 'logout'])->name('logout');

    // for category admin\
    route::get('/Addcategory',[AdminCategoryController::class, 'showAddCategory'])->name('showAddCategory');
    route::post('/Addcategory',[AdminCategoryController::class, 'AddCategory'])->name('AddCategory');
    
});
