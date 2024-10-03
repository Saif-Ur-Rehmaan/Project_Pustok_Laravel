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

Route::get('/s', function () {
   
   return session()->all();
});
Route::view('/cart', 'cart');
Route::view('/compare', 'compare');


Route::view('/wishlist', 'wishlist');
Route::view('/faq', 'faq');




Route::prefix("/blogs")->group(function () {
   Route::view('/', 'Blogs.blogs');
   Route::view('/blog-details', 'Blogs.blog-details');
});

// App Controller
Route::controller(AppController::class)->group(function () {

   Route::get('/', 'Index');
   Route::get('index', 'Index');
   
   Route::view('/shop-grid', 'shop-grid')->name('shop');
   Route::get('/product-details/{id}', 'ProductDetails');
   Route::get('/search/{Query?}', 'Search')->name('search');



   Route::get('/contact', 'ContactUs');

   Route::post('/contact', 'SendMessage')->name('sendMessage');
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
    
      Route::get('/checkout', function () {
         if (!session()->has('cart')) {
            return redirect('/shop-grid')->with('fail', 'No Items Were In Cart You Must Add Some Items In Cart Before Checkout');
         }

         return view('checkout'); // return the checkout view

      });
      Route::get('/order-completed', function () {
         if (!session('Details')) {
            return redirect('/shop-grid')->with('fail', 'Add Some Items to cart And Checkout First');
         }
     
         return view('order-completed', ['Details' => session('Details')]);
      });


      Route::get('/logout', 'logoutUser');
      // Review
      Route::post('/SendReview', 'SendReview');
      Route::get('/DeleteReview/{EncryptedId}', 'DeleteReview');
   });
});
