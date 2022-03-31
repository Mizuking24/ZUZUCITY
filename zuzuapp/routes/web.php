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
Route::get('/item', 'ItemController@index')->name('user.item_index');
Route::get('/item/{id}/show', 'ItemController@show')->name('user.item_show');
Route::post('/cart/add', 'CartController@add')->name('user.cart_add');
Route::get('/cart/index', 'CartController@index')->name('user.cart_index');
Route::post('/cart/{id}/destroy', 'CartController@destroy')->name('user.cart_destroy');
Route::post('/order/new', 'OrderController@new')->name('user.order_new');
Route::post('/order/check', 'OrderController@check')->name('user.order_check');
Route::post('/order/create', 'OrderController@create')->name('user.order_create');

Route::prefix('admin')->group(function () {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'Auth\AdminController@index')->name('admin.index');
    Route::get('/item', 'Admin\ItemController@index')->name('admin.item_index');
    Route::get('/item/new', 'Admin\ItemController@new')->name('admin.item_new');
    Route::post('/item/create', 'Admin\ItemController@create')->name('admin.item_create');
    Route::get('/item/{id}/show', 'Admin\ItemController@show')->name('admin.item_show');
});