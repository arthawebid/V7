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
Route::get('/about', function () {
    echo "ini merupakan contoh sebuah page (page about)"  ;
 })->name("about");
 
 Route::get('/show/{id?}', function ($id=1) {
 echo "Nilai Parameter Adalah ".$id;
 });
 
 Route::get('/home', function () {
 echo "<a href='".route('about')."'>page about </a>";
 });
 
 Route::get('/produk','produkController@index');