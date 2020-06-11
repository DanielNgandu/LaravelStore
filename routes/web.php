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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products', 'ProductsController@index')->name('products');
//used to create a product
Route::get('/product/create', 'ProductsController@create')->name('create.product');
//used to store
Route::post('/product/store', 'ProductsController@store')->name('store.product');
//show
Route::get('/product/show/{id}', 'ProductsController@show')->name('show.product');
//edit
Route::get('/product/edit/{id}', 'ProductsController@edit')->name('edit.product');
//update
Route::post('/product/update/{id}', 'ProductsController@update')->name('update.product');
//delete
Route::get('/product/delete/{id}', 'ProductsController@destroy')->name('delete.product');
