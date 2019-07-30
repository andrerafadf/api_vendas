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

Route::get      ('/produto/{id}',   'ProdudosController@show');
Route::post     ('/produtos',       'ProdudosController@lists');
Route::post     ('/produto',        'ProdudosController@store');
Route::put      ('/produto/{id}',   'ProdudosController@update');
Route::delete   ('/produto/{id}',   'ProdudosController@destroy');


Route::get      ('/pedido/{id}',   'PedidosController@show');
Route::post     ('/pedidos',       'PedidosController@lists');
Route::post     ('/pedido',        'PedidosController@store');
Route::put      ('/pedido/{id}',   'PedidosController@update');
Route::delete   ('/pedido/{id}',   'PedidosController@destroy');


Route::get      ('/situacao/{id}',   'SituacoesController@show');
Route::post     ('/situacoes',       'SituacoesController@lists');
Route::post     ('/situacao',        'SituacoesController@store');
Route::put      ('/situacao/{id}',   'SituacoesController@update');
Route::delete   ('/situacao/{id}',   'SituacoesController@destroy');
