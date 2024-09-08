<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClienteController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/clientes', [ClienteController::class, 'index']);
Route::POST('/create', [ClienteController::class, 'store'])->name('cliente.add');
Route::get('/editar/{id}', [ClienteController::class, 'edit'])->name('cliente.editar');
Route::post('/atualizar/{id}', [ClienteController::class, 'update'])->name('cliente.atualizar');
Route::get('/excluir/{id}', [ClienteController::class, 'destroy'])->name('cliente.excluir');

require __DIR__.'/auth.php';
