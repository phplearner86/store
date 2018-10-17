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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('products', 'Product\\ProductController');


Route::get('mycart', 'Cart\CartController@show')->name('carts.show');
Route::get('mycart/empty', 'Cart\CartController@destroy')->name('carts.destroy');
Route::post('mycart/{product}', 'Cart\CartController@store')->name('carts.store');
Route::get('mycart/{rowId}', 'Cart\CartController@remove')->name('carts.remove');
Route::patch('mycart/{rowId}', 'Cart\CartController@update')->name('carts.update');

Route::resource('orders', 'OrderController');
