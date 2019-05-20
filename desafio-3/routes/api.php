<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/usuarios', ['as'=>'usuario.todos','uses'=>'UsuariosController@listarUsuarios']);
Route::get('/usuarios/{id}', ['as'=>'usuario.listar','uses'=>'UsuariosController@listarUsuario']);
Route::post('/usuarios', ['as'=>'usuario.criar','uses'=>'UsuariosController@criarUsuario']);
Route::put('/usuarios/{id}', ['as'=>'usuario.atualizar','uses'=>'UsuariosController@atualizarUsuario']);
Route::delete('/usuarios/{id}', ['as'=>'usuario.deletar','uses'=>'UsuariosController@deletarUsuario']);




