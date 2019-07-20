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

Route::get('/', 'DashboardController@index');

Route::get('/login', 'UsersController@login')->name('login');
Route::post('/login', 'UsersController@loginProcess')->name('login.submit');

Route::get('/register', 'UsersController@register')->name('register');
Route::post('/register', 'UsersController@registerProcess')->name('register.submit');

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return response()->json('cache-clear');
});

Route::get('/config-cache', function() {
    Artisan::call('config:cache');
    return response()->json('config-clear');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function(){
  Route::group(['prefix' => 'kategori'], function(){
    Route::get('/', 'KategoriController@index')->name('admin.kategori');
    Route::get('/baru', 'KategoriController@new')->name('admin.kategori.new');
    Route::post('/baru', 'KategoriController@create')->name('admin.kategori.create');
    Route::get('/edit/{id}', 'KategoriController@edit')->name('admin.kategori.edit');
    Route::post('/edit/{id}', 'KategoriController@update')->name('admin.kategori.update');
    Route::post('/delete', 'KategoriController@delete')->name('admin.kategori.delete');
  });

  Route::group(['prefix' => 'katalog'], function(){
    Route::get('/', 'KatalogController@index')->name('admin.katalog');
    Route::get('/baru', 'KatalogController@new')->name('admin.katalog.new');
    Route::post('/baru', 'KatalogController@create')->name('admin.katalog.create');
    Route::get('/edit/{id}', 'KatalogController@edit')->name('admin.katalog.edit');
    Route::post('/edit/{id}', 'KatalogController@update')->name('admin.katalog.update');
    Route::post('/delete', 'KatalogController@delete')->name('admin.katalog.delete');
  });

  Route::get('/dashboard', 'DashboardController@dashboard')->name('admin.dashboard');
  Route::get('/logout', 'DashboardController@logout')->name('admin.logout');
});
