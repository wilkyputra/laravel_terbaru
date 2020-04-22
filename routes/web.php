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


//login
Route::get('/','AuthController@login')->name('login');
Route::post('/postLogin','AuthController@postLogin');
Route::post('/register','AuthController@register');
Route::get('/logout','AuthController@logout');



Route::group(['middleware' => ['auth','checkRole:admin']], function(){
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

		// ruangan
		Route::get('/ruangan', 'RuanganController@index');

		Route::get('/ruangan/createRuangan', 'RuanganController@create');

		Route::post('/ruangan/storeRuangan', 'RuanganController@store');

		Route::get('/ruangan/deleteRuangan/{id}', 'RuanganController@destroy');

		Route::get('/ruangan/editRuangan/{id}', 'RuanganController@edit');
		Route::post('/ruangan/updateRuangan/{id}', 'RuanganController@update');

		
});


Route::group(['middleware' => ['auth','checkRole:admin,staff']], function(){

	// barang
		Route::get('/barang', 'BarangController@index');

		Route::get('/barang/createBarang', 'BarangController@create');

		Route::post('/barang/storeBarang', 'BarangController@store');

		Route::get('/barang/deleteBarang/{id}', 'BarangController@destroy');

		Route::get('/barang/editBarang/{id}', 'BarangController@edit');
		Route::post('/barang/updateBarang/{id}', 'BarangController@update');

		Route::get('/barang/exportXLSX','BarangController@exportXLSX');

		//dashbrot
		Route::get('/dashboard','Controller@dashboard');


});




