<?php

use App\Http\Controllers\Api\TipoPessoaController;
use App\Http\Controllers\Api\TipoAnexo\TipoAnexoController;
use App\Http\Controllers\Api\Cliente\ClienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('tipos-pessoa', TipoPessoaController::class);
Route::apiResource('tipos-anexo', TipoAnexoController::class);
Route::apiResource('clientes', ClienteController::class);


Route::get('/', function () {
     return response()->json(['message' => 'Welcome to the API!']);
});