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

Route::get('/','ProductController@index');
Route::get('/product/viewProduct/{id}','ProductController@viewProduct')->name('product.view');
Route::get('/product/createProduct','ProductController@createProduct');
Route::post('/product/store','ProductController@store')->name('product.store');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>'auth'], function () {

});