<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrarUserController;
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

Route::get('/', function () {
    return view('login')->with('page', 'login');
})->name('login');

Route::post('/login', [LoginController::class, 'authenticate'])->name('login.submit');

Route::get('/registrar-usuario', function () {
    return view('registrar-usuario')->with('page', 'Registrar Usuário');
})->name('registrar-usuario');

Route::post('registrar-usuario', [RegistrarUserController::class, 'RegistroUsuario']);

Route::get('/index', function () {
    return view('index')->with('page', 'menu');
})->name('index');

Route::get('/registrar-dieta', function () {
    return view('registrar-dieta')->with('page', 'registrar-dieta');
})->name('registrar-dieta');

Route::get('/registrar-treino', function () {
    return view('registrar-treino')->with('page', 'registro-treino');
})->name('registrar-treino');

Route::get('/registrar-receita', function () {
    return view('registrar-receita')->with('page', 'registrar-receitas');
})->name('registrar-receita');

Route::get('/dieta', function () {
    return view('dieta')->with('page', 'dieta');
})->name('dieta');

Route::get('/treinos', function () {
    return view('treinos')->with('page', 'treino');
})->name('treinos');

Route::get('/evolucao', function () {
    return view('evolucao')->with('page', 'evolucao');
})->name('evolucao');

Route::get('/receitas', function () {
    return view('receitas')->with('page', 'receitas');
})->name('receitas');

