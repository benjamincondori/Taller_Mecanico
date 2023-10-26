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

        Route::get('/personal', [PersonalController::class, 'index'])->name('personal.index');
        Route::get('/personal/create', [PersonalController::class, 'create'])->name('personal.create');
        Route::get('/personal/edit/{id}', [PersonalController::class, 'edit'])->name('personal.edit');
        Route::post('/personal', [PersonalController::class, 'store'])->name('personal.store');
        Route::get('/personal/delete/{id}', [PersonalController::class, 'destroy'])->name('personal.delete');
        Route::post('/personal/update/{id}', [PersonalController::class, 'update'])->name('personal.update');

        Route::get('/cargo', [CargoController::class, 'index'])->name('cargo.index');
        Route::get('/cargo/create', [CargoController::class, 'create'])->name('cargo.create');
        Route::get('/cargo/edit/{id}', [CargoController::class, 'edit'])->name('cargo.edit');
        Route::post('/cargo', [CargoController::class, 'store'])->name('cargo.store');
        Route::get('/cargo/delete/{id}', [CargoController::class, 'destroy'])->name('cargo.delete');
        Route::post('/cargo/update/{id}', [CargoController::class, 'update'])->name('cargo.update');


        Route::get('/vehiculos', [VehiculoController::class, 'index'])->name('vehiculos.index');
        Route::get('/vehiculos/create', [VehiculoController::class, 'create'])->name('vehiculos.create');
        Route::get('/vehiculos/edit/{id}', [VehiculoController::class, 'edit'])->name('vehiculos.edit');
        Route::post('/vehiculos', [VehiculoController::class, 'store'])->name('vehiculos.store');
        Route::get('/vehiculos/delete/{id}', [VehiculoController::class, 'destroy'])->name('vehiculos.delete');
        Route::post('/vehiculos/update/{id}', [VehiculoController::class, 'update'])->name('vehiculos.update');
        Route::put('/dashboard/vehiculos/update/{id}', [VehiculoController::class, 'update'])->name('vehiculos.update');

        Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
        Route::get('/roles', [RolesController::class, 'index'])->name('roles.index');
        Route::get('/permisos', [PermisosController::class, 'index'])->name('permisos.index');

        Route::get('/marcas', [MarcaController::class, 'index'])->name('marcas.index');
        Route::get('/marcas/create', [MarcaController::class, 'create'])->name('marcas.create');
        Route::get('/marcas/edit/{id}', [MarcaController::class, 'edit'])->name('marcas.edit');
        Route::post('/marcas', [MarcaController::class, 'store'])->name('marcas.store');
        Route::get('/marcas/delete/{id}', [MarcaController::class, 'destroy'])->name('marcas.delete');
        Route::post('/marcas/update/{id}', [MarcaController::class, 'update'])->name('marcas.update');

        Route::get('/tipovehiculo', [tipovehiculoController::class, 'index'])->name('tipovehiculo.index');
        Route::get('/tipovehiculo/create', [tipovehiculoController::class, 'create'])->name('tipovehiculo.create');
        Route::get('/tipovehiculo/edit/{id}', [tipovehiculoController::class, 'edit'])->name('tipovehiculo.edit');
        Route::post('/tipovehiculo', [tipovehiculoController::class, 'store'])->name('tipovehiculo.store');
        Route::get('/tipovehiculo/delete/{id}', [tipovehiculoController::class, 'destroy'])->name('tipovehiculo.delete');
        Route::post('/tipovehiculo/update/{id}', [tipovehiculoController::class, 'update'])->name('tipovehiculo.update');


        Route::get('/modelos', [ModeloController::class, 'index'])->name('modelos.index');
        Route::get('/modelos/create', [ModeloController::class, 'create'])->name('modelos.create');
        Route::get('/modelos/edit/{id}', [ModeloController::class, 'edit'])->name('modelos.edit');
        Route::post('/modelos', [ModeloController::class, 'store'])->name('modelos.store');
        Route::post('/modelos/update/{id}', [ModeloController::class, 'update'])->name('modelos.update');
        Route::get('/modelos/delete/{id}', [ModeloController::class, 'destroy'])->name('modelos.delete');

        Route::get('/bitacora', [bitacoraController::class, 'index'])->name('bitacora.index');

        Route::get('/proveedor', [proveedorController::class, 'index'])->name('proveedor.index');
        Route::get('/proveedor/create', [proveedorController::class, 'create'])->name('proveedor.create');
        Route::get('/proveedor/edit/{id}', [proveedorController::class, 'edit'])->name('proveedor.edit');
        Route::post('/proveedor', [proveedorController::class, 'store'])->name('proveedor.store');
        Route::get('/proveedor/delete/{id}', [proveedorController::class, 'destroy'])->name('proveedor.delete');
        Route::post('/proveedor/update/{id}', [proveedorController::class, 'update'])->name('proveedor.update');

        Route::get('/diagnostico', [diagnosticoController::class, 'index'])->name('diagnostico.index');
        Route::get('/diagnostico/create', [diagnosticoController::class, 'create'])->name('diagnostico.create');
        Route::get('/diagnostico/edit/{id}', [diagnosticoController::class, 'edit'])->name('diagnostico.edit');
        Route::post('/diagnostico', [diagnosticoController::class, 'store'])->name('diagnostico.store');
        Route::get('/diagnostico/delete/{id}', [diagnosticoController::class, 'destroy'])->name('diagnostico.delete');
        Route::post('/diagnostico/update/{id}', [diagnosticoController::class, 'update'])->name('diagnostico.update');
    });
});

