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

//Route::resource('users', 'UserController')->only('show');


Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
    //show product catalog
    Route::get('/', 'ProductController@index')->name('index');
    //show def product
    Route::get('/{product}', 'ProductController@show')->name('show')
        ->where('product', '[0-9]+');
    //filter products using category, asc, desc sorting
    Route::post('/filter', 'ProductController@filter')->name('filter');
    //calculate the product price in the product details pop up window
    Route::post('/calculate_product_price', 'ProductController@calculateProductPrice')->name('calculate_product_price');
});


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


