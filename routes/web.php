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

Route::get('categories', 'App\Http\Controllers\CategoryController@index')->name('categories.index');
Route::get('categories/create', 'App\Http\Controllers\CategoryController@create')->name('categories.create');
Route::post('categories/create', 'App\Http\Controllers\CategoryController@store')->name('categories.store');
Route::get('categories/edit/{id}', 'App\Http\Controllers\CategoryController@edit')->name('categories.edit');
Route::post('categories/edit/{id}', 'App\Http\Controllers\CategoryController@update')->name('categories.update');
Route::get('categories/delete/{id}', 'App\Http\Controllers\CategoryController@delete')->name('categories.delete');

Route::get('projects', 'App\Http\Controllers\ProjectController@index')->name('projects.index');
Route::get('projects/category/{category_slug}', 'App\Http\Controllers\ProjectController@index')->name('projects.category');

Route::get('projects/create', 'App\Http\Controllers\ProjectController@create')->name('projects.create');
Route::post('projects/create', 'App\Http\Controllers\ProjectController@store')->name('projects.store');
Route::get('projects/edit/{id}', 'App\Http\Controllers\ProjectController@edit')->name('projects.edit');
Route::post('projects/edit/{id}', 'App\Http\Controllers\ProjectController@update')->name('projects.update');
Route::get('projects/delete/{id}', 'App\Http\Controllers\ProjectController@delete')->name('projects.delete');
