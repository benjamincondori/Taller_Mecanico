<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\bitacoraController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\diagnosticoController;
use App\Http\Controllers\proveedorController;
use App\Http\Controllers\tipovehiculoController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
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



Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('auth.index');
    Route::post('/', [AuthController::class, 'login'])->name('auth.login');
});


Route::middleware(['auth.admin'])->group(function () {
    Route::get('/logout', function() {
        return back();
    });
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DefaultController::class, 'index'])->name('dashboard');

        Route::get('/clientes', [ClientesController::class, 'index'])->name('clientes.index');
        Route::get('/clientes/create', [ClientesController::class, 'create'])->name('clientes.create');
        Route::get('/clientes/edit/{id}', [ClientesController::class, 'edit'])->name('clientes.edit');
        Route::post('/clientes', [ClientesController::class, 'store'])->name('clientes.store');
        Route::get('/clientes/delete/{id}', [ClientesController::class, 'destroy'])->name('clientes.delete');
        Route::post('/clientes/update/{id}', [ClientesController::class, 'update'])->name('clientes.update');

        Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
        Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
        Route::get('/productos/edit/{id}', [ProductoController::class, 'edit'])->name('productos.edit');
        Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
        Route::get('/productos/delete/{id}', [ProductoController::class, 'destroy'])->name('productos.delete');
        Route::post('/productos/update/{id}', [ProductoController::class, 'update'])->name('productos.update');

        Route::get('/personal', [PersonalController::class, 'index'])->name('personal.index');
        Route::get('/personal/cargo', [CargoController::class, 'index'])->name('cargo.index');

        Route::get('/vehiculos', [VehiculoController::class, 'index'])->name('vehiculos.index');

        Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
        Route::get('/roles', [RolesController::class, 'index'])->name('roles.index');
        Route::get('/permisos', [PermisosController::class, 'index'])->name('permisos.index');

        Route::get('/marcas', [MarcaController::class, 'index'])->name('marcas.index');
        Route::get('/tipovehiculo', [tipovehiculoController::class, 'index'])->name('tipovehiculo.index');

        Route::get('/modelos', [ModeloController::class, 'index'])->name('modelos.index');
        Route::get('/modelos/create', [ModeloController::class, 'create'])->name('modelos.create');
        Route::get('/modelos/edit/{modelo}', [ModeloController::class, 'edit'])->name('modelos.edit');
        Route::post('/modelos', [ModeloController::class, 'store'])->name('modelos.store');
        Route::post('/modelos/update/{modelo}', [ModeloController::class, 'update'])->name('modelos.update');

        Route::get('/bitacora', [bitacoraController::class, 'index'])->name('bitacora.index');
        Route::get('/proveedor', [proveedorController::class, 'index'])->name('proveedor.index');
        Route::get('/diagnostico', [diagnosticoController::class, 'index'])->name('diagnostico.index');
    });
});

