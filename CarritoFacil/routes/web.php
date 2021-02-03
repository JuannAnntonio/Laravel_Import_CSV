<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::resource('productos', 'ProductsController');

Route::get('/home', 'HomeController@index')->name('home');


//CSV
Route::get('import-products', 'ProductsController@import');
Route::post("parse-csv", "ProductsController@importProducts");
