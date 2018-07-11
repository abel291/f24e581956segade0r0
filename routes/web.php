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

/*Route::get('/ddda', function () {
   foreach (\App\Product::get() as $key => $value) {
   		$value->seo_title='Comprar '.$value->category->name.' en Málaga';
   		$value->seo_desc='Comprar '.$value->category->name.' '.$value->title.' en Málaga. Segade Joyería de segunda mano en Málaga.';
   		$value->save();
   	}	
});*/

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

Route::group(['prefix' => 'dashboard','middleware' => 'admin'], function() { 

	Route::get('/', 'dashboard\DashboardController@index')->name('dashboard');	 
	
	Route::resource('/productos', 'dashboard\ProductController');
	
	Route::resource('/slider', 'dashboard\SliderController');
	
	Route::get('/img/{id}/delete', 'dashboard\ProductController@delete_img')->name('delete_img');

	Route::get('/reservados', 'dashboard\ReservedController@reserved')->name('d_reserved');

	Route::get('/reservados/status', 'dashboard\ReservedController@status')->name('status');
	
	Route::get('/reservados/{reserved}/{status}/status', 'dashboard\ReservedController@status')->name('statu_reserved');

	Route::resource('/usuarios', 'dashboard\UserController');

	Route::resource('/blog', 'dashboard\BlogController');

	Route::resource('/page', 'dashboard\PageController');

	Route::resource('/categorias', 'dashboard\CategoryController');

	Route::get('/page/{id}/remove_image', 'dashboard\PageController@remove_image')->name('page.remove_image');

	//Route::post('/reserved', 'dashboard\ReservedController@status');
    
});

Route::get('/', 'HomeController@index')->name('home');

Route::get('/joyeria-segunda-mano-malaga', 'HomeController@categories')->name('categories');

Route::get('/contacto', 'HomeController@contacts')->name('contactos');

Route::get('/page/{slug}', 'PageController@index')->name('page');

Route::get('/empeno-malaga', 'PageController@empeno')->name('empeno');

Route::get('/cesta', 'ReservedController@reserved')->name('reserved')->middleware('auth');

Route::post('/agregar', 'ReservedController@add')->name('add')->middleware('auth');

Route::get('/remover/{remove_product}', 'ReservedController@remove')->name('remove')->middleware('auth');

Route::get('/revision', 'ReservedController@checkout')->name('checkout')->middleware('auth');

Route::post('/apartar', 'ReservedController@store')->name('store_r')->middleware('auth');

Route::get('/historial', 'ReservedController@history')->name('history')->middleware('auth');

Route::get('/busqueda', 'ProductController@search')->name('search');

Route::get('/blog', 'BlogController@index')->name('blog');

Route::get('/blog/{categoria}/{slug?}/', 'BlogController@entradas')->name('entradas');

//Route::get('/novedades', 'ProductController@novedades')->name('novedades');

Route::get('/{categoria}/{slug?}/', 'ProductController@product')->name('product');




