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

Route::resource('users', 'UserController')->only('show');

Route::resource('products', 'ProductController')->only(['index', 'show']);

Route::group(['prefix' => 'shopping_cart', 'as' => 'shopping_cart.'], function () {
//shopping cart operations (not entity)
    Route::put('/{id}', 'ShoppingCartController@store')
        ->name('store');
    Route::patch('/', 'ShoppingCartController@update')
        ->name('update');
    Route::delete('/', 'ShoppingCartController@delete')
        ->name('delete');
    Route::get('/', 'ShoppingCartController@index')
        ->name('index');
});
