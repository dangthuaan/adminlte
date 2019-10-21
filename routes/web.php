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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function () {
    return view('pages.admin');
});

Route::get('/admin/books', 'BookController@index')->name('books.index');
//Route::get('/admin/books/create', 'BookController@create')->name('books.create');
Route::post('/admin/books', 'BookController@store')->name('books.store');
//Route::get('/admin/book/{book}/edit', 'BookController@edit')->name('books.edit');
Route::put('/admin/books/{book}', 'BookController@update')->name('books.update');
Route::delete('/admin/books/{book}', 'BookController@destroy')->name('books.destroy');
