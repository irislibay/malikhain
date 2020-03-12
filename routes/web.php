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
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/workshop', function(){
    return view('workshop');
});

Route::get('/workshop/styletransferArt', function(){
    return view('styletransferArt');
});

Route::get('/workshop/styletransferPoem', function(){
    return view('styletransferPoem');
});

Route::get('/Gallery', function () {
    return view('Gallery');
});

Route::get('/Gallery/{post}', 'ProjectsController@show');

Route::get('/ArtistPage', function () {
    return view('ArtistPage');
});

