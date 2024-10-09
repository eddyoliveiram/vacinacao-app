<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControleController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\VacinaController;

Route::middleware(['guest'])->group(function () {
    Route::view('/', 'auth.login');
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/controles/funcionario/{funcionario}/vacina', [ControleController::class, 'create'])->name('controles.vacina');
    Route::get('/controles/funcionario/{funcionario}/vacina/{vacina}/edit', [ControleController::class, 'edit'])->name('controles.editVacina');
    Route::delete('/controles/funcionario/{funcionario}/vacina/{vacina}', [ControleController::class, 'destroy'])->name('controles.destroyVacina');
    Route::resource('/controles', ControleController::class);
    Route::resource('/funcionarios', FuncionarioController::class);
    Route::resource('/vacinas', VacinaController::class);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
