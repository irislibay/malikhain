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

Route::get('', function () {
    return view('home');
})->name('home');

// Redirect "/home" to "/"
Route::get('home', function () {
    return redirect(route('home'));
});

Route::get('workshop', function () {
    return view('workshop');
})->name('workshop');

Route::get('workshop/styletransferArt', 'FileController@create');

Route::get('workshop/styletransferPoem', function () {
    return view('styletransferPoem');
});

// Route::get('/Gallery', function () {
//     return view('Gallery');
// });
Route::get('Gallery', 'FileController@index')->name('index');

Route::get('ArtistPage', function () {
    return view('ArtistPage');
});

Route::get('ArtistPage/individual', function () {
    return view('individual');
});

Route::resource('file', 'FileController');
Route::resource('posts', 'PostsController');
Route::resource('poem', 'PoemController');
