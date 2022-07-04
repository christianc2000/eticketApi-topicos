<?php

use App\Http\Controllers\api\CategoriaController;
use App\Http\Controllers\api\EventoController;
use App\Http\Controllers\api\LocalidadController;
use App\Http\Controllers\api\SectorController;
use App\Http\Controllers\api\TelefonoController;
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
Route::apiResource('evento',EventoController::class);
Route::apiResource('categoria',CategoriaController::class);
Route::apiResource('telefono',TelefonoController::class);
Route::apiResource('localidad',LocalidadController::class);
Route::apiResource('sector',SectorController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
