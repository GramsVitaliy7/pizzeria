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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::resource('users', 'UserController')->only('show');

Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
    //show product catalog
    Route::get('/', 'ProductController@index')->name('index');
    //show def product
    Route::get('/{product}', 'ProductController@show')->name('show')
        ->where('product', '[0-9]+');
    //filter products using category, asc, desc sorting
    Route::post('/filter', 'ProductController@filter')
        ->middleware('ajax_only')
        ->name('filter');
    //calculate the product price in the product details pop up window
    Route::post('/calculate_product_price', 'ProductController@calculateProductPrice')
        ->middleware('ajax_only')
        ->name('calculate_product_price');
});


Route::group(['prefix' => 'shopping_cart', 'as' => 'shopping_cart.'], function () {
    //shopping cart operations (not entity)
    Route::put('/{id}', 'ShoppingCartController@store')
        ->middleware('ajax_only')
        ->name('store');
    Route::patch('/', 'ShoppingCartController@update')
        ->middleware('ajax_only')
        ->name('update');
    Route::delete('/', 'ShoppingCartController@delete')
        ->middleware('ajax_only')
        ->name('delete');
    Route::get('/', 'ShoppingCartController@index')
        ->name('index');
    Route::get('/user_info', 'UserInfoController@index')
        ->name('user_info.index');
    Route::get('/payment', 'PaymentController@index')
        ->name('payment.index');
});


Route::group(['middleware' => 'auth'], function () {
    //auth routes
    Route::group(['prefix' => 'home', 'as' => 'home.'], function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::get('/tracking', 'TrackingController@index')
            ->name('tracking.index');
    });
    Route::resource('/orders', 'OrderController')->only(['index', 'show']);
    //admin routes
    Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        Route::resource('/permissions', 'PermissionController');
        Route::resource('/roles', 'RoleController');
        Route::resource('/products', 'ProductController');
        Route::resource('/product_categories', 'ProductCategoryController');
        Route::resource('/orders', 'OrderController')->only(['index', 'show']);
    });
});

