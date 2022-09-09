<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Rutas para la obtencion de datos de la vista documentacion tecnica
Route::get('/doc-tecnica-tabulador', 'App\Http\Controllers\documentacion_tecnica@getTabuladorManoObra');
Route::get('/doc-tecnica-fasar', 'App\Http\Controllers\documentacion_tecnica@getFasar');
Route::get('/doc-tecnica-explosionInsumos', 'App\Http\Controllers\documentacion_tecnica@getExplosionInsumos');

Route::get('/doc-tecnica-all', 'App\Http\Controllers\documentacion_tecnica@getAllDocumentacion');
Route::get('/doc-tecnica-trabajosExtra', 'App\Http\Controllers\documentacion_tecnica@getAllTrabajosExtra');

Route::get('/doc-tecnica-all/q={query}', 'App\Http\Controllers\documentacion_tecnica@getAllDocumentacionQuery');
Route::get('/doc-tecnica-trabajosExtra/q={query}', 'App\Http\Controllers\documentacion_tecnica@getAllTrabajosExtraQuery');
