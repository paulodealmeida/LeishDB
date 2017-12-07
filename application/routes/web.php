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

Route::view('/', 'welcome');

Route::resource('search', 'SearchController');

Route::view('/mirna-graph', 'mirna');

Route::view('/blast', 'blast');

Route::view('/genome-browser', 'genome-browser');
