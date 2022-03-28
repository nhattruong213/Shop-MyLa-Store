<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
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
 
Route::get('profile', [AuthenticatedSessionController::class, 'show'])
                ->name('profile')->middleware(['auth']);
Route::post('ChangeProfile/{id}', [AuthenticatedSessionController::class, 'ChangeProfile'])
                ->name('ChangeProfile')->middleware(['auth']);     
Route::get('ViewHistoryOrder/{email}', [AuthenticatedSessionController::class, 'ViewHistoryOrder'])
                ->name('ViewHistoryOrder')->middleware(['auth']);  
Route::get('ViewOrderDetail/{id}', [AuthenticatedSessionController::class, 'ViewOrderDetail'])
                ->name('ViewOrderDetail')->middleware(['auth']); 
Route::get('returnOrder/{id}', [AuthenticatedSessionController::class, 'returnOrder'])
                ->name('returnOrder')->middleware(['auth']);           

Route::get('/',[HomeController::class, 'index'])->name('homepage');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
// include __DIR__.'/admin.php';
