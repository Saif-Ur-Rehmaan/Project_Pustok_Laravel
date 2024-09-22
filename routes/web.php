<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\UserController;
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
Route::get('/s', function () { 
   return session()->all();
});
Route::view('index', 'Index');
Route::view('/cart', 'cart');
Route::view('/compare', 'compare');


Route::view('/checkout', 'checkout');
Route::view('/wishlist', 'wishlist');
Route::view('/faq', 'faq');




Route::prefix("/blogs")->group(function () {
   Route::view('/', 'Blogs.blogs');
   Route::view('/blog-details', 'Blogs.blog-details');
});

// App Controller
Route::controller(AppController::class)->group(function () {
   Route::view('/shop-grid', 'shop-grid')->name('shop');
   Route::get('/product-details/{id}', 'ProductDetails');
   Route::get('/search/{Query?}', 'Search')->name('search');


   Route::get('/contact','ContactUs');
   
   Route::post('/contact','SendMessage')->name('sendMessage');
});


// user  Authentication
Route::controller(UserController::class)->group(function () {
   // only guest allowed
   Route::middleware('guest')->group(function () {
      // login or register page
      Route::view('/login-register', 'login-register')->name('login');
      // register
      Route::post('/register', 'RegisterUser')->name('users.register');
      // login
      Route::post('/login', 'LoginUser')->name('users.login');
   });
   Route::middleware('auth')->group(function () {
      Route::view('/my-account', 'my-account');
      Route::view('/order-completed', 'order-completed');
      
      
      Route::get('/logout', 'logoutUser');
      // Review
      Route::post('/SendReview', 'SendReview');
      Route::get('/DeleteReview/{EncryptedId}', 'DeleteReview');
   });
});
