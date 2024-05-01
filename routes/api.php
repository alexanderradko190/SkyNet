<?php

use App\Http\Controllers\TariffController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get-tariff', [TariffController::class, 'getTariff']);
Route::get('/tariffs', [TariffController::class, 'index']);
Route::post('/tariff', [TariffController::class, 'store']);
Route::get('/tariff/{id}', [TariffController::class, 'show']);
Route::put('/tariff/{id}', [TariffController::class, 'update']);
Route::delete('/tariff/{id}', [TariffController::class, 'destroy']);
