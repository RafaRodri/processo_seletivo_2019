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

Route::get('/', ['as' => 'usuario.criar', 'uses' => 'WebController@criar']);

Route::post('/user', ['as' => 'usuario.salvar', 'uses' => 'WebController@salvar']);
Route::get('/user', ['as' => 'usuario.listar', 'uses' => 'WebController@listar']);
Route::get('/user{id}', ['as' => 'usuario.editar', 'uses' => 'WebController@editar']);
Route::put('/user{id}', ['as' => 'usuario.atualizar', 'uses' => 'WebController@atualizar']);
Route::get('/user{id}/delete', ['as' => 'usuario.deletar', 'uses' => 'WebController@deletar']);
