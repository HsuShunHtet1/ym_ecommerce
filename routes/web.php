<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\User\AuthController as UserAuthController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware'=>'ShareData'],function(){

Route::get('/',[PageController::class,'index']);
Route::get('/product/category/{slug}',[PageController::class,'byCategory']);
Route::get('/product/search',[PageController::class,'search']);
#User Auth
Route::get('/login',[UserAuthController::class,'showLogin']);
Route::post('/login',[UserAuthController::class,'postLogin']);
Route::get('/logout',[UserAuthController::class,'logout']);
Route::get('/register',[UserAuthController::class,'showRegister']);
Route::post('/register',[UserAuthController::class,'postRegister']);

Route::get('/product/{slug}',[PageController::class,'productDetail']);
Route::get('/product/cart/add/{slug}',[PageController::class,'addToCart']);
Route::get('/cart',[PageController::class,'cart']);
Route::get('/order/make',[PageController::class,'makeOrder']);
Route::get('/order/pending',[PageController::class,'pendingOrder']);
Route::get('/order/complete',[PageController::class,'completeOrder']);

Route::get('/profile',[PageController::class,'profile']);
Route::post('/profile',[PageController::class,'changeProfile']);
});




Route::get('/admin/login',[AuthController::class,'showLogin']);
Route::post('/admin/login',[AuthController::class,'postLogin']);

Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>'Admin'],function(){
    Route::get('/',[AdminPageController::class,'dashboard']);
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);

    #For Order
    Route::get('/order/pending',[OrderController::class,'pending']);
    Route::get('/order/complete',[OrderController::class,'complete']);
    Route::get('/order/complete/{id}',[OrderController::class,'makeComplete']);

    #For User
    Route::get('/user',[AdminPageController::class,'alluser']);
    Route::get('/logout',[AuthController::class,'logout']);
});
