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

// Home
Route::get('/', 'Page\HomeController@index')->name('home');
// About-us
Route::get('/about', 'Page\HomeController@about')->name('about-us');
// Search
Route::get('/search', 'Page\HomeController@search')->name('search');
// Artist
Route::prefix('artist')->name('artist.')->group(function () {
    Route::get('/', 'Page\ArtistController@list')->name('list');
    Route::get('/read', 'Page\ArtistController@read')->name('read');
});
// Genre
Route::prefix('genre')->name('genre.')->group(function () {
    Route::get('/', 'Page\GenreController@list')->name('list');
    Route::get('/read', 'Page\GenreController@read')->name('read');
});
// Song
Route::prefix('song')->name('song.')->group(function () {
    Route::get('/', 'Page\SongController@list')->name('list');
    Route::get('/read', 'Page\SongController@read')->name('read');
});

Auth::routes([
    'register'  => false,
    'reset'     => false,
    'verify'    => false
]);

// Admin
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    // Home
    Route::get('/', 'Admin\HomeController@index')->name('home');
    // Artist
    Route::prefix('artist')->name('artist.')->group(function () {
        Route::get('/', 'Admin\ArtistController@list')->name('list');
        Route::get('/add', 'Admin\ArtistController@add')->name('add');
        Route::get('/edit', 'Admin\ArtistController@edit')->name('edit');
        Route::get('/delete', 'Admin\ArtistController@delete')->name('delete');
        Route::post('/add', 'Admin\ArtistController@create')->name('create');
        Route::post('/edit', 'Admin\ArtistController@update')->name('update');
    });
    // Genre
    Route::prefix('genre')->name('genre.')->group(function () {
        Route::get('/', 'Admin\GenreController@list')->name('list');
        Route::get('/add', 'Admin\GenreController@add')->name('add');
        Route::get('/edit', 'Admin\GenreController@edit')->name('edit');
        Route::get('/delete', 'Admin\GenreController@delete')->name('delete');
        Route::post('/add', 'Admin\GenreController@create')->name('create');
        Route::post('/edit', 'Admin\GenreController@update')->name('update');
    });
    // Album
    Route::prefix('album')->name('album.')->group(function () {
        Route::get('/', 'Admin\AlbumController@list')->name('list');
        Route::get('/add', 'Admin\AlbumController@add')->name('add');
        Route::get('/read', 'Admin\AlbumController@read')->name('read');
        Route::get('/edit', 'Admin\AlbumController@edit')->name('edit');
        Route::get('/delete', 'Admin\AlbumController@delete')->name('delete');
        Route::post('/add', 'Admin\AlbumController@create')->name('create');
        Route::post('/edit', 'Admin\AlbumController@update')->name('update');
    });
    // Song
    Route::prefix('song')->name('song.')->group(function () {
        Route::get('/', 'Admin\SongController@list')->name('list');
        Route::get('/add', 'Admin\SongController@add')->name('add');
        Route::get('/read', 'Admin\SongController@read')->name('read');
        Route::get('/edit', 'Admin\SongController@edit')->name('edit');
        Route::get('/delete', 'Admin\SongController@delete')->name('delete');
        Route::post('/add', 'Admin\SongController@create')->name('create');
        Route::post('/edit', 'Admin\SongController@update')->name('update');
    });
});
