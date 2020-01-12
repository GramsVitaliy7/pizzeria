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

Route::group(['middleware' => 'auth'], function () {
    //auth routes
    Route::get('/home', 'HomeController@index')->name('home');
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
