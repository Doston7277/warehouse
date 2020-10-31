<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WarehouseController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('index', function () {
    return view('index');
})->middleware('auth');

Route::get('/kirim', 'WarehouseController@index_kirim')->middleware('auth');

Route::post('/kirim_insert', 'WarehouseController@store_kirim')->middleware('auth');

Route::get('/kirim_select', 'WarehouseController@show_kirim')->middleware('auth');

Route::get('/chiqim', 'WarehouseController@index_chiqim')->middleware('auth');

Route::post('/chiqim_insert', 'WarehouseController@store_chiqim')->middleware('auth');

Route::get('/chiqim_select', 'WarehouseController@show_chiqim')->middleware('auth');

Route::get('/tranzaksiya', 'WarehouseController@show_tranzaksiya')->middleware('auth');

Route::get('/baza/{type}', 'WarehouseController@show_baza')->middleware('auth');

Route::get('/type', 'WarehouseController@index_type')->middleware('auth');

Route::post('/type_insert', 'WarehouseController@store_type')->middleware('auth');

Route::get('/search', 'WarehouseController@search')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');