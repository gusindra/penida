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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::group(['prefix' => 'nata'], function(){
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::get('/pages','App\Http\Controllers\Back\PekaranganController@index')->name('karang');
        Route::get('/pages/create','App\Http\Controllers\Back\PekaranganController@gae')->name('add.karang');
        Route::post('/pages/store','App\Http\Controllers\Back\PekaranganController@store')->name('store.karang');
        Route::get('/pages/{id}/edit','App\Http\Controllers\Back\PekaranganController@edit')->name('edit.karang');
        Route::put('/pages/{id}/update','App\Http\Controllers\Back\PekaranganController@update')->name('update.karang');
        Route::delete('/pages/{id}/delete','App\Http\Controllers\Back\PekaranganController@hapus')->name('hapus.karang');

        Route::get('/setting/{slug}', function ($slug) {
            return view('setting')->with('slug', $slug);
        })->name('setting');

        Route::get('/register', function () {
            return view('dashboard');
        })->name('register');
        Route::group(['prefix' => 'bale'], function(){
            Route::put('/update', 'App\Http\Controllers\Back\BaleController@update')->name('update.app');
            Route::put('/update/caption', 'App\Http\Controllers\Back\BaleController@updatecaption')->name('update.caption');
            Route::put('/update/logo', 'App\Http\Controllers\Back\BaleController@updatelogo')->name('update.logo');
            Route::post('/add/banner', 'App\Http\Controllers\Back\BaleController@addbanner')->name('add.banner');
            Route::put('/update/banner', 'App\Http\Controllers\Back\BaleController@updatebanner')->name('update.banner');
            Route::delete('/delete/{id}/banner', 'App\Http\Controllers\Back\BaleController@deletebanner')->name('delete.banner');
        });

        Route::get('/gallery/create','App\Http\Controllers\Back\GalleryController@gae')->name('add.gallery');
        Route::post('/gallery/store','App\Http\Controllers\Back\GalleryController@store')->name('store.gallery');
        Route::get('/gallery/{id}/edit','App\Http\Controllers\Back\GalleryController@edit')->name('edit.gallery');
        Route::put('/gallery/{id}/update','App\Http\Controllers\Back\GalleryController@update')->name('update.gallery');
        Route::delete('/gallery/{id}/delete','App\Http\Controllers\Back\GalleryController@hapus')->name('delete.gallery');
    });
});

Route::get('/', 'App\Http\Controllers\Front\HomeController@index')->name('home');
Route::get('home', 'App\Http\Controllers\Front\HomeController@index');

Route::get('/{slug}', 'App\Http\Controllers\Front\PagesController@detail')->name('page');
Route::post('contact', 'App\Http\Controllers\Front\HomeController@contact')->name('contact');
Route::post('booking', 'App\Http\Controllers\Front\HomeController@booking')->name('booking');
Route::get('testing/route', 'App\Http\Controllers\Front\HomeController@testing')->name('testing');
