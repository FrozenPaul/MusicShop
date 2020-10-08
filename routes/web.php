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
})->name('log_in');

Route::get('/registration', function (){
    return view('registration');
})->name('registration');

//Route::post('/authors/search','AuthorController@getAuthorByName')
//    ->name('findAuthor');

Route::get('/authors/search/name','AuthorController@getAuthorByName')
    ->name('find_author');

//Route::post('/search','MainController@getAllMusicByName')
//    ->name('search_music');

Route::get('/search','MainController@getAllMusicByName')
    ->name('search_music');

Route::get('/search/genre/{genre_id}', 'MainController@getAllMusicByGenre')
    ->name('search_music_by_genre');

Route::get('/search/instrument/{instrument_id}', 'MainController@getAllMusicByInstrument')
    ->name('search_music_by_instrument');

Route::get('/music_tracks/{id}', 'Music_trackController@getSingleTrack')
    ->name('single_track');

Route::get('/users/all/{id}','UserController@getUser')
    ->name('user_show');

Route::post('/users/all/{id}/edit','UserController@editUserByAdmin')
    ->name('user_edit');

Route::get('/users/all/{id}/delete','UserController@deleteUser')
    ->name('user_delete');

Route::get('/allAuthors','AuthorController@getAllAuthorsForAdmin')
    ->name('authors_all')->middleware('admin');

Route::get('/allAuthors/add','AuthorController@addAuthor')
    ->name('add_author')->middleware('admin');

Route::post('/allAuthors/add', 'AuthorController@saveAuthor')
    ->name('save_author')->middleware('admin');

//download music_track

Route::get('/download/{download_link}','Music_trackController@download')
    ->name('download')->middleware('auth');

// delete author

Route::get('/allAuthors/delete/{id}','AuthorController@delete')
    ->name('delete_author')->middleware('admin');

// edit author

Route::get('allAuthors/edit/{id}', 'AuthorController@editAuthor')
    ->name('edit_author')->middleware('admin');

Route::post('allAuthors/edit/{id}/update','AuthorController@updateAuthor')
    ->name('update_author')->middleware('admin');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// logout
Route::get('/logout', 'UserController@logout')->name('log_out');

//add comment

Route::post('/music_tracks/{id}/addComment','Music_trackController@addComment')
    ->name('add_comment');

// get all tracks for admin

Route::get('/allTracks','Music_trackController@getAllTracksForAdmin')
    ->name('music_tracks_all')->middleware('admin');

Route::get('/allTracks/add', 'Music_trackController@addMusicTrack')
    ->name('add_music_track')->middleware('admin');

Route::post('/allTracks/add', 'Music_trackController@saveMusicTrack')
    ->name('save_music_track')->middleware('admin');

Route::get('/allTracks/delete/{id}', 'Music_trackController@delete')
    ->name('delete_music_track')->middleware('admin');

Route::get('/allTracks/edit/{id}', 'Music_trackController@editMusicTrack')
    ->name('edit_music_track')->middleware('admin');

Route::post('allTracks/edit/{id}/update', 'Music_trackController@updateMusicTrack')
    ->name('update_music_track')->middleware('admin');

// rating

Route::post('/rating','RatingController@saveRating')->name('save_rating')->middleware('auth');


