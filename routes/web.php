<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Página de login
Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/funcionarios', function () {
    return view('funcionarios');
})->name('funcionarios');

Route::get('/vacinas', function () {
    return view('vacinas');
})->name('vacinas');

Route::get('/controle', function () {
    return view('controle');
})->name('controle');

Route::get('/logout', function () {
    return redirect()->route('login');
})->name('logout');
