<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsuarioController;
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

Route::get('/', [AuthController::class, 'index'])->name('auth.index');
Route::post('/', [AuthController::class, 'login'])->name('auth.login');


Route::get('/dashboard', [DefaultController::class, 'index'])->name('dashboard');
Route::get('/dashboard/clientes', [ClientesController::class, 'index'])->name('clientes.index');
Route::get('/dashboard/personal', [PersonalController::class, 'index'])->name('personal.index');
Route::get('/dashboard/personal/cargo', [CargoController::class, 'index'])->name('cargo.index');
Route::get('/dashboard/vehiculos', [VehiculoController::class, 'index'])->name('vehiculos.index');
Route::get('/dashboard/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('/dashboard/roles', [RolesController::class, 'index'])->name('roles.index');