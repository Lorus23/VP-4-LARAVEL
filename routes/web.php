<?php

Route::get('/','ProductController@index');
Route::get('/product/viewProduct/{id}','ProductController@viewProduct')->name('product.view');
Route::get('/product/categoryProducts/{id}','ProductController@categoryProducts')->name('product.categoryProducts');
Route::get('/product/createProduct','ProductController@createProduct');
Route::post('/product/store','ProductController@store')->name('product.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>'auth'], function () {

});