<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrarUserController;
use App\Http\Controllers\DietaController;
use App\Http\Controllers\EvolucaoController;
use App\Http\Controllers\ReceitaController;
use App\Http\Controllers\TreinoController;
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

Route::post('registrar-user', [RegistrarUserController::class, 'RegistroUsuario']);

Route::get('/index', function () {
    return view('index')->with('page', 'menu');
})->name('index');

Route::post('/registrar-dieta/store', [DietaController::class, 'registrarDieta']);
Route::get('/registrar-dieta', function () {
    return view('registrar-dieta')->with('page', 'registrar-dieta');
})->name('registrar-dieta');

Route::get('/registrar-treino', function () {
    return view('registrar-treino')->with('page', 'registro-treino');
})->name('registrar-treino');
Route::post('/registro-treino', [TreinoController::class, 'registrarTreino'])->name('registro.treino');

Route::get('/registrar-receita', function () {
    return view('registrar-receita')->with('page', 'registrar-receitas');
})->name('registrar-receita');
Route::post('/registro-receita', [ReceitaController::class, 'registrarReceita']);

Route::get('/exibir-dieta', [DietaController::class, 'exibirDieta'])->name('exibir.dieta');

Route::get('/pagina-treino', function () {
    return view('treinos')->with('page', 'treino');
})->name('pagina-treino');

Route::get('/evolucao', [EvolucaoController::class, 'index'])->name('evolucao');
Route::post('/registrar-medicao', [EvolucaoController::class, 'store'])->name('registrar.medicao');

Route::get('/treinos', [TreinoController::class, 'index'])->name('treinos');
Route::get('/treinos/{id}', [TreinoController::class, 'show'])->name('treinos.show');

Route::get('/receitas', [ReceitaController::class, 'index'])->name('receitas');
Route::get('/pagina_receita/{id}', [ReceitaController::class, 'show'])->name('receitas.show');
