<?php

use App\Http\Controllers\Site\AuthController;
use App\Http\Controllers\Site\CategoryController;
use App\Http\Controllers\Site\HomerController;
use App\Http\Controllers\Site\ProductController;
use App\Http\Controllers\Site\WishlistController;
use App\Http\Controllers\Site\CartController;


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

//Route::get('/', function () {
//    return view('welcome');
//})->name('home');




Route::group(['namespace' => 'Site'], function () {
    //guest  user
    route::get('/', [HomerController::class,'home'])->name('home');
    route::get('category/{id}', [CategoryController::class,'productsByid'])->name('category');

    route::get('product/{id}', [ProductController::class,'productsByid'])->name('product.details');

    /**
     *  Cart routes
     */
    Route::get('register', [AuthController::class,'register'])->name('register');
    Route::post('register/post', [AuthController::class,'register_post'])->name('register.post');
    Route::get('login', [AuthController::class,'login'])->name('login');
    Route::post('login/post', [AuthController::class,'login_post'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(['prefix' => 'cart'], function () {
        Route::get('/shopping-cart', [CartController::class, 'ProductCart'])->name('shopping.cart');
        Route::post('/add/{id}', [CartController::class,'addProducttoCart'])->name('cart.store');
        Route::patch('/update-shopping-cart', [CartController::class, 'updateCart'])->name('update.sopping.cart');
        Route::delete('/delete-cart-product', [CartController::class, 'deleteProduct'])->name('delete.cart.product');

        Route::get('/cart/checkout', [CartController::class,'checkout'])->name('cart.checkout');
        Route::post('/cart/confirm', [CartController::class,'confirm'])->name('cart.confirm');
    });

    Route::group(['namespace' => 'Site', 'middleware' => 'auth'], function () {
        // must be authenticated user
//        Route::post('verify-user/', [VerificationCodeController::class,'verify'])->name('verify-user');
//        Route::get('verify', [VerificationCodeController::class,'getVerifyPage'])->name('get.verification.form');
//        Route::get('products/{productId}/reviews', [ProductReviewController::class,'index'])->name('products.reviews.index');
//        Route::post('products/{productId}/reviews', [ProductReviewController::class,'store'])->name('products.reviews.store');
//        Route::get('payment/{amount}', [PaymentController::class,'getPayments']) -> name('payment');
//        Route::post('payment', [PaymentController::class,'processPayment']) -> name('payment.process');

    });

});
Route::group(['namespace' => 'Site', 'middleware' => 'auth'], function () {
    Route::post('wishlist',  [WishlistController::class,'store'])->name('wishlist.store');
    Route::delete('wishlist',  [WishlistController::class,'destroy'])->name('wishlist.destroy');
    Route::get('wishlist/products', [WishlistController::class,'index'])->name('wishlist.products.index');
});
