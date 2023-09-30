<?php

use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProductController;
use Illuminate\Support\Facades\Route;

define('PC',11);

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::group(['namespace' => 'Dashboard',  'prefix' => 'admin'], function () {

    Route::get('login',[AuthController::class,'login'])->name('admin.login');
    Route::post('login', [AuthController::class,'postLogin'])->name('admin.post.login');
    Route::get('logout', [AuthController::class,'logout'])->name('admin.logout');
});
Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin'], function () {
    Route::get('/', [DashboardController::class,'index'])->name('admin.dashboard');  // the first page admin visits if authenticated



    Route::group(['prefix' => 'profile'], function () {
        Route::get('edit', [ProfileController::class,'editProfile'])->name('edit.profile');
        Route::put('update', [ProfileController::class,'updateprofile'])->name('update.profile');
    });

    ################################## categories routes ######################################
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', [CategoriesController::class,'index'])->name('admin.categories');
        Route::post('store', [CategoriesController::class,'store'])->name('admin.store.category');
        Route::get('edit/{id}',[CategoriesController::class,'edit'])->name('admin.categories.edit');
        Route::post('update/{id}', [CategoriesController::class,'update'])->name('admin.categories.update');
        Route::get('delete/{id}', [CategoriesController::class,'destroy'])->name('admin.categories.delete');
    });

    ################################## enf categories routes ######################################

    ################################## Product routes ######################################

    Route::group(['prefix' => 'product'], function () {
        Route::get('/', [ProductController::class,'index'])->name('admin.product');
        Route::get('/card/product', [ProductController::class,'card'])->name('admin.product.card');

        Route::post('store', [ProductController::class,'store'])->name('admin.store.product');
        Route::get('edit/{id}',[ProductController::class,'edit'])->name('admin.product.edit');
        Route::post('update/{id}', [ProductController::class,'update'])->name('admin.product.update');
        Route::get('delete/{id}', [ProductController::class,'destroy'])->name('admin.product.delete');

        Route::post('Filter_Category', [ProductController::class,'Filter_Category'])->name('Filter_Category');

    });
});

