<?php

use App\Http\Controllers\Api\TreinamentoController;
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

// Route::apiResource('treinamento',TreinamentoController::class);
Route::get('treinamento/listar', [TreinamentoController::class, 'index'])->name('treinamento.index');
Route::post('treinamento/criar', [TreinamentoController::class, 'store'])->name('treinamento.store');
Route::delete('treinamento/deletar/{id}', [TreinamentoController::class, 'destroy'])->name('treinamento.delete');
Route::get('treinamento/detalhe/{id}', [TreinamentoController::class, 'show'])->name('treinamento.show');
