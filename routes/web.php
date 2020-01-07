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
Route::resource('customer', 'CustomerController');
Route::post('customer/customr_list', 'CustomerController@customerList')->name('customer_list');
Route::resource('product', 'ProductController');
Route::post('product/product_list', 'ProductController@productList')->name('product_list');
Route::post('product/productStatus', 'ProductController@changeStatus')->name('changeStatus');

Route::resource('order', 'OrderController');
Route::post('order/order_list', 'OrderController@orderList')->name('order_list');

Route::resource('activity', 'ActivityController');
Route::post('activity/activity_list', 'ActivityController@activityList')->name('activity_list');
