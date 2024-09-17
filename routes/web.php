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
Route::view('index', 'Index');
Route::view('/cart', 'cart');
Route::view('/compare', 'compare');

Route::get('/contact', function () {

   $APIKEY = config('services.api.GOOGLE_MAP_API_KEY');

   return view('contact', compact('APIKEY'));
});

Route::view('/checkout', 'checkout');
Route::view('/wishlist', 'wishlist');
Route::view('/faq', 'faq');
Route::view('/search/{id?}', 'search')->name('search');



Route::prefix("/blogs")->group(function () {
   Route::view('/', 'Blogs.blogs');
   Route::view('/blog-details', 'Blogs.blog-details');
});

// App Controller
Route::controller(AppController::class)->group(function (){
   Route::view('/shop-grid', 'shop-grid')->name('shop');  
   Route::get('/product-details/{id}', 'ProductDetails');

});


// user  Authentication
Route::controller(UserController::class)->group(function () {
   // only guest allowed
   Route::middleware('guest')->group(function (){
      // login or register page
      Route::view('/login-register', 'login-register');
      // register
      Route::post('/register','RegisterUser')->name('users.register');
      // login
      Route::post('/login','LoginUser')->name('users.login');
   });
   Route::middleware('auth')->group(function () {
      Route::view('/my-account', 'my-account');
      Route::view('/order-completed', 'order-completed');
      

      Route::get('/logout','logoutUser');
   });
});
