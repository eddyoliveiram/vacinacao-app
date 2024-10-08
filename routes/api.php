<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\VacinaController;
use App\Http\Controllers\ControleController;
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



Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/funcionarios', [FuncionarioController::class, 'index']);
    Route::post('/funcionarios', [FuncionarioController::class, 'store']);
    Route::get('/funcionarios/{id}', [FuncionarioController::class, 'show']);
    Route::put('/funcionarios/{id}', [FuncionarioController::class, 'update']);
    Route::delete('/funcionarios/{id}', [FuncionarioController::class, 'destroy']);

    Route::get('/vacinas', [VacinaController::class, 'index']);
    Route::post('/vacinas', [VacinaController::class, 'store']);
    Route::get('/vacinas/{id}', [VacinaController::class, 'show']);
    Route::put('/vacinas/{id}', [VacinaController::class, 'update']);
    Route::delete('/vacinas/{id}', [VacinaController::class, 'destroy']);

    Route::get('/controle', [ControleController::class, 'index']);
    Route::post('/controle', [ControleController::class, 'store']);
    Route::get('/controle/{id}', [ControleController::class, 'show']);
    Route::put('/controle/{id}', [ControleController::class, 'update']);
    Route::delete('/controle/{id}', [ControleController::class, 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});

