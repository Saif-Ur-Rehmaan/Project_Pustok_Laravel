<?php

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

Route::view('/', 'Index');
Route::view('/index', 'Index');
Route::view('/product-details', 'product-details');
Route::view('/cart', 'cart');
Route::view('/compare', 'compare');

Route::get('/contact',function (){

   $APIKEY=config('services.api.GOOGLE_MAP_API_KEY');

   return view('contact',compact('APIKEY'));
});

Route::view('/checkout', 'checkout');
Route::view('/wishlist', 'wishlist');
Route::view('/faq', 'faq');
Route::view('/order-completed', 'order-completed');
Route::view('/shop-grid', 'shop-grid');
Route::view('/my-account', 'my-account');
Route::view('/search', 'search');
Route::view('/login-register', 'login-register');

Route::prefix("/blogs")->group(function () {
   Route::view('/','Blogs.blogs') ;
   Route::view('/blog-details','Blogs.blog-details') ; 
});

