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

Route::get('/', ['as' => 'noticia.index', 'uses' => 'NoticiaController@index']);
Route::post('/', ['as' => 'noticia.search', 'uses' => 'NoticiaController@search']);
Route::get('/page={id}/{search?}', ['as' => 'noticia.page', 'uses' => 'NoticiaController@page']);
