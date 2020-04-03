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


// fakultas
Route::get('/fakultas', 'FakultasController@index');

Route::get('/fakultas/createFakultas', 'FakultasController@create');

Route::post('/fakultas/storeFakultas', 'FakultasController@store');

Route::get('/fakultas/deleteFakultas/{id}', 'FakultasController@destroy');

Route::get('/fakultas/editFakultas/{id}', 'FakultasController@edit');
Route::post('/fakultas/updateFakultas/{id}', 'FakultasController@update');

//jurusan
Route::get('/jurusan', 'JurusanController@index');
Route::get('/jurusan/search','JurusanController@search');
Route::get('/jurusan/createJurusan', 'JurusanController@create');

Route::post('/jurusan/storeJurusan', 'JurusanController@store');

Route::get('/jurusan/deleteJurusan/{id}', 'JurusanController@destroy');

Route::get('/jurusan/editJurusan/{id}', 'JurusanController@edit');
Route::post('/jurusan/updateJurusan/{id}', 'JurusanController@update');



