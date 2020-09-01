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
    return view('main');
})->name('main');

Route::get('/users', 'UserController@showUsers')->name('users');

Route::get('/authors', 'AuthorController@getAllAuthors')->name('authors');

Route::get('/about', function (){
    return view('about');
})->name('about');

Route::get('/authors/{id}', 'AuthorController@getAuthorById')->name('author');

Route::get('/author', function (){
    return view('author');
});
