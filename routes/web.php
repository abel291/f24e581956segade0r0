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

/*Route::get('/', function () {
    return view('home');
});*/

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::group(['prefix' => 'dashboard','middleware' => 'admin'], function() { 

	Route::get('/', 'DashboardController@index')->name('dashboard');	 
	Route::resource('/productos', 'ProductoController');  
    
});

Route::get('/', 'HomeController@index')->name('home');

Route::get('/categorias', 'HomeController@categories')->name('categories');

Route::get('/contactos', 'HomeController@contacts')->name('contactos');

Route::get('/cesta', 'ReservedController@reserved')->name('reserved')->middleware('auth');

Route::post('/agregar', 'ReservedController@add')->name('add')->middleware('auth');

Route::get('/remover/{remove_product}', 'ReservedController@remove')->name('remove')->middleware('auth');

Route::get('/revision', 'ReservedController@checkout')->name('checkout')->middleware('auth');

Route::post('/apartar', 'ReservedController@store')->name('store_r')->middleware('auth');

Route::get('/historial', 'ReservedController@history')->name('history')->middleware('auth');

Route::get('/busqueda', 'ProductController@search')->name('search');
Route::get('/{categoria}/{slug?}/', 'ProductController@product')->name('product');


