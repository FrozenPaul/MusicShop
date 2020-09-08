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

Route::get('/','MainController@main')->name('main');


Route::get('/users', 'UserController@showUsers')->name('users');

Route::get('/authors', 'AuthorController@getAllAuthors')->name('authors');

Route::get('/about', function (){
    return view('about');
})->name('about');

Route::get('/authors/{id}', 'AuthorController@getAuthorById')->name('author');

Route::get('/author', function (){
    return view('author');
});

Route::get('/auth', function (){
    return view('auth');
})->name('login');

Route::get('/registration', function (){
    return view('registration');
})->name('registration');

Route::post('/authors/name','AuthorController@getAuthorByName')
    ->name('findAuthor');

Route::post('/search','MainController@getAllMusicByName')
    ->name('search_music');

//Route::get('/search','MainController@getAllMusicByName')
//    ->name('search_music');

Route::get('/search/genre/{genre_id}', 'MainController@getAllMusicByGenre')
    ->name('search_music_by_genre');

Route::get('/search/instrument/{instrument_id}', 'MainController@getAllMusicByInstrument')
    ->name('search_music_by_instrument');

Route::get('/music_tracks/{id}', 'Music_trackController@getSingleTrack')
    ->name('single_track');

Route::get('/users/all/{id}','UserController@getUser')->name('user_show');

Route::post('/users/all/{id}/edit','UserController@editUserByAdmin')->name('user_edit');

Route::get('/users/all/{id}/delete','UserController@deleteUser')->name('user_delete');

Route::get('/allAuthors','AuthorController@getAllAuthorsForAdmin')->name('authors_all');

Route::get('/allAuthors/add','AuthorController@addAuthor')->name('add_author');

Route::post('/allAuthors/add', 'AuthorController@saveAuthor')->name('save_author');


