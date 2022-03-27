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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

/* START - Dosen */
// Menampilkan Seluruh Data Dosen
Route::get('/dosens', 'DosenController@index')->name('dosens');

// Menambahkan Dosen
Route::get('/dosen', 'DosenController@create')->name('add_dosen.form');
Route::post('/dosen', 'DosenController@store')->name('add_dosen.process');

// Mengedit Data Dosen
Route::get('/dosens/{id}', 'DosenController@edit')->name('edit_dosen.form');
Route::patch('/dosens/{id}', 'DosenController@update')->name('edit_dosen.process');

// Menghapus Data Dosen
Route::delete('/dosens/{id}', 'DosenController@destroy')->name('delete_dosen');
/* END - Dosen */


/* START - Mata Kuliah */
// Menampilkan Seluruh Data Mata Kuliah
Route::get('/matakuliahs', 'MataKuliahController@index')->name('mata_kuliah');

// Menambahkan Mata Kuliah
Route::get('/matakuliah', 'MataKuliahController@create')->name('add_mata_kuliah.form');
Route::post('/matakuliah', 'MataKuliahController@store')->name('add_mata_kuliah.process');

// Mengedit Data Mata Kuliah
Route::get('/matakuliahs/{id}', 'MataKuliahController@edit')->name('edit_mata_kuliah.form');
Route::patch('/matakuliahs/{id}', 'MataKuliahController@update')->name('edit_mata_kuliah.process');

// Menghapus Data Mata Kuliah
Route::delete('/matakuliahs/{id}', 'MataKuliahController@destroy')->name('delete_mata_kuliah');
/* END - Mata Kuliah */