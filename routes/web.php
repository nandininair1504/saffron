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
})->name('home');

Route::prefix('categories')
       ->namespace('App\Http\Controllers')
       ->name('categories.')
       ->group(function() {
           Route::get('/', 'CategoryController@index')->name('index');
           Route::get('create', 'CategoryController@create')->name('create');
           Route::post('create', 'CategoryController@store')->name('store');
           Route::get('edit/{id}', 'CategoryController@edit')->name('edit');
           Route::post('edit/{id}', 'CategoryController@update')->name('update');
           Route::get('delete/{id}', 'CategoryController@delete')->name('delete');
       });

Route::prefix('projects')
    ->name('projects.')
    ->namespace('App\Http\Controllers')
    ->group(function() {
        Route::get('/', 'ProjectController@index')->name('index');
        Route::get('category/{category_slug}', 'ProjectController@index')->name('category');
        Route::get('create', 'ProjectController@create')->name('create');
        Route::post('create', 'ProjectController@store')->name('store');
        Route::get('edit/{id}', 'ProjectController@edit')->name('edit');
        Route::post('edit/{id}', 'ProjectController@update')->name('update');
        Route::get('delete/{id}', 'ProjectController@delete')->name('delete');
        Route::get('charts', 'ProjectController@charts')->name('charts');
    });





