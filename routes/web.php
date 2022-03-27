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