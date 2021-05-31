<?php

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
// login logout & register routes
Auth::routes();

Route::domain('{username}.'.env('APP_DOMAIN'))->group(function(){
    Route::get('/', 'ProfileController@show')->name('profile.show');

});
Route::get('/profile', 'ProfileController@index')->name('root');
// home routes
Route::get('/', 'HomeController@index')->name('home');

// activate user account route
Route::get('/activate/{code}', 'ActivationController@activateUserAccount')->name('user.activate');
Route::get('/resend/{email}', 'ActivationController@resendActivationCode')->name('code.resend');

// products routes
Route::resource('products', 'ProductController');
Route::get('products/category/{category}', 'HomeController@getProductsByCategory')->name("category.products");

// cart routes
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart/add/{product}', 'CartController@addProductToCart')->name('cart.add');
Route::put('/cart/update/{product}', 'CartController@updateProductInCart')->name('cart.update');
Route::delete('/cart/remove/{product}', 'CartController@removeProductFromCart')->name('cart.remove');

// payments route
Route::get('/handel-payment', 'PaypalPaymentsController@handelPayment')->name('make.payment');
Route::get('/cancel-payment', 'PaypalPaymentsController@paymentCancel')->name('cancel.payment');
Route::get('/success-payment', 'PaypalPaymentsController@paymentSuccess')->name('success.payment');

// admin route
Route::get('/admin', 'AdminController@index')->name('admin.index');
Route::get('/admin/login', 'AdminController@showAdminLogin')->name('admin.login');
Route::post('/admin/login', 'AdminController@adminLogin')->name('admin.login');
Route::get('/admin/logout', 'AdminController@adminLogout')->name('admin.logout');

Route::get('/admin/products', 'AdminController@getProducts')->name('admin.products');
Route::get('/admin/orders', 'AdminController@getOrders')->name('admin.orders');

// orders routes
Route::resource('orders', 'OrderController');

// categories routes
Route::resource('categories', 'CategoryController');
