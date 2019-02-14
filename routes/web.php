<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', 'GuestController@about')->name('about');
Route::get('/contact', 'GuestController@contact')->name('contact');
Route::get('/shop', 'GuestController@getProducts')->name('guest.products');

Route::get('/shop/{product}', 'GuestController@showProduct')->name('guest.show');

Route::post('/contact', 'GuestController@storeContact')->name('contact.store');

Route::get('/', 'GuestController@welcome')->name('welcome');

Route::get('/add-to-cart/{product}','GuestController@getAddToCart')->name('guest.addToCart');

Route::get('/shopping-cart','GuestController@getCart')->name('guest.shoppingCart');

Route::get('/profile', 'GuestController@profile')->name('guest.profile');

Route::patch('/profile', 'GuestController@update')->name('guest.update');

Auth::routes();

Route::group(['middleware' => 'isAdmin'], function(){
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
	Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

	Route::resource('/products','ProductController');
	Route::resource('/reservas','ReserveController');
	Route::resource('/users', 'UserController');
});