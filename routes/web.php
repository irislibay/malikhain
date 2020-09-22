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
Route::get('workshop/styletransferArt/{name}', 'FileController@download');

Route::get('workshop/styletransferPoem', 'PoemController@create');

Route::get('Gallery', 'FileController@index')->name('index');

Route::get('ArtistPage', function () {
    return view('ArtistPage');
});

Route::get('ArtistPage/PacitaAbad', function () {
    return view('Abad');
});

Route::get('ArtistPage/AngKiukok', function () {
    return view('Ang');
});

Route::get('ArtistPage/FranciscoBalagtas', function () {
    return view('Balagtas');
});

Route::get('ArtistPage/ManuelBaldemor', function () {
    return view('Baldemor');
});

Route::get('ArtistPage/JuanLuna', function () {
    return view('Luna');
});

Route::get('ArtistPage/JoseRizal', function () {
    return view('Rizal');
});

Route::resource('file', 'FileController');
Route::resource('posts', 'PostsController');
Route::resource('poem', 'PoemController');
