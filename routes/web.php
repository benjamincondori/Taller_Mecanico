<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\LoginController;
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

Route::get('/', [LoginController::class, 'index'])->name('index');
Route::get('/dashboard', [DefaultController::class, 'index'])->name('default.index');
