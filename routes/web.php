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
 
 Route::get('/produk','produkController@show');

 Route::get('/latihanView01',function(){
     return view("latihan01");
 });
 Route::get('/produk/showproduk','produkController@showproduk');

 Route::get('/prak9_01','Prak9Controller@QB_tugas1');
 Route::get('/prak9_02','Prak9Controller@QB_tugas2');
 Route::get('/prak9_03','Prak9Controller@QB_tugas3');
 Route::resource('/prak10','Prak10Controller');
 Route::get('/prak11/logout','Prak11Controller@logout')->name('prak11.logout');
 Route::resource('/prak11','Prak11Controller');
Auth::routes();

Route::get('/prak14','Prak11Controller@index');
Route::get('/prak14/ChartProdperKat','Prak14Controller@ChartProdperKat')->name('prak14.ProdukperKategori');
Route::get('/prak14/{id}/perkategori', 'Prak14Controller@ChartKategori')->name('prak14.perkategori');
Route::get('/home', 'HomeController@index')->name('home');
