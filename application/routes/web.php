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

Route::get('/mirna-graph', function () {
    return view('mirna');
});

Route::get('/search', function () {
    return view('search');
});

Route::get('/search-detail', function () {
    return view('search-detail');
});

Route::get('/blast', function () {
    return view('blast');
});

Route::get('/genome-browser', function () {
    return view('genome-browser');
});