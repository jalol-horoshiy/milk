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
use \Illuminate\Support\Facades\Auth;

Auth::routes();
Route::get('/', function () {
    if(Auth::user() == null)
        return view('auth.login');
    else
        return back();
});
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('sellers','SellerController');
Route::resource('workers','WorkerController');
Route::resource('products','ProductTypeController');
Route::resource('histories','HistoryController');

Route::post('milks/find' , 'MilkController@find');

Route::resource('milks','MilkController');

Route::resource('mproducts','MilkProductController');
Route::get('/sellers/edit/{id}' , 'SellerController@edit');
Route::get('/workers/edit/{id}' , 'WorkerController@edit');
Route::get('/products/edit/{id}' , 'ProductTypeController@edit');
Route::get('sellers/delete/{id}' , 'SellerController@destroy');
Route::get('products/delete/{id}' , 'ProductTypeController@destroy');
