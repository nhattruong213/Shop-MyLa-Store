<?php

use App\Http\Controllers\Dashboard\AdminCategoryController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AuthenController;
use App\Http\Controllers\Dashboard\BrandAdminController;
use App\Http\Controllers\Dashboard\ProductAdminController;
use App\Models\Admin;
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
Route::group(['middleware' => ['check_login_admin'] , 'as' => 'admin.'], function () {
    Route::get('login', [AuthenController::class, 'getLogin'])->name('login');
    // Route::post('login', [AuthenController::class, 'postLogin'])->name('login.handle');
    // Route::post('logout', [AuthenController::class, 'logout'])->name('logout');
	
	// // Admin Dashboard
	// Route::get('/', [AdminController::class, 'ShowDashBoard'])->name('PageAdmin');	
});
 
// route for admin
// Route::prefix('admin')->group(function(){
    // Route::get('/',[AdminController::class, 'ShowDashBoard'])->name('PageAdmin');
    // Route::get('/login',[AdminController::class, 'index'])->name('ShowLogin');
    // route::post('/login',[AdminController::class, 'login'])->name('loginAdmin');
    // route::get('/logout',[AdminController::class, 'logout'])->name('logoutAdmin');

    // // for category admin\
    // route::get('/Addcategory',[AdminCategoryController::class, 'showAddCategory'])->name('showAddCategory');
    // route::post('/Addcategory',[AdminCategoryController::class, 'AddCategory'])->name('AddCategory');
    // route::get('/ShowAllCategory',[AdminCategoryController::class, 'ShowAllCategory'])->name('ShowAllCategory');
    // route::get('/deleteCategory/{id}',[AdminCategoryController::class, 'deleteAdminCategory'])->name('deleteAdminCategory');
    // route::get('/editCategory/{id}',[AdminCategoryController::class, 'editAdminCategory'])->name('editAdminCategory'); 
    // route::post('/UpdateCategory/{id}',[AdminCategoryController::class, 'UpdateCategory'])->name('UpdateCategory');
    // route::get('/searchCategoryAdmin',[AdminCategoryController::class, 'searchCategoryAdmin'])->name('searchCategoryAdmin');

    // // for brands admin
    // route::get('/AddBrand',[BrandAdminController::class, 'showAddBrand'])->name('showAddBrand');
    // route::post('/AddBrand',[BrandAdminController::class, 'AddBrand'])->name('AddBrand');
    // route::get('/ShowAllBrand',[BrandAdminController::class, 'ShowAllBrand'])->name('ShowAllBrand');
    // route::get('/deleteBrand/{id}',[BrandAdminController::class, 'deleteAdminBrand'])->name('deleteAdminBrand');
    // route::get('/editBrand/{id}',[BrandAdminController::class, 'editAdminBrand'])->name('editAdminBrand'); 
    // route::post('/UpdateBrand/{id}',[BrandAdminController::class, 'UpdateBrand'])->name('UpdateBrand');
    // route::get('/searchBrandAdmin',[BrandAdminController::class, 'searchBrandAdmin'])->name('searchBrandAdmin');
    

    // // for product admin
    // route::get('/AddProduct',[ProductAdminController::class, 'showAddProduct'])->name('showAddProduct');
    // route::post('/AddProduct',[ProductAdminController::class, 'AddProduct'])->name('AddProduct');
// });

