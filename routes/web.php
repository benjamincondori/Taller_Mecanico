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
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\CotizacionServicioController;
use App\Http\Controllers\CotizacionProductoController;
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

Route::get('/', [AuthController::class, 'index'])->name('auth.index');
Route::post('/', [AuthController::class, 'login'])->name('auth.login');


Route::get('/dashboard', [DefaultController::class, 'index'])->name('dashboard');


Route::get('/dashboard/clientes', [ClientesController::class, 'index'])->name('clientes.index');
Route::get('/dashboard/clientes/create', [ClientesController::class, 'create'])->name('clientes.create');
Route::get('/dashboard/clientes/edit/{id}', [ClientesController::class, 'edit'])->name('clientes.edit');
Route::post('/dashboard/clientes', [ClientesController::class, 'store'])->name('clientes.store');
Route::delete('/dashboard/clientes/delete/{id}', [ClientesController::class, 'destroy'])->name('clientes.delete');
Route::post('/dashboard/clientes/update/{id}', [ClientesController::class, 'update'])->name('clientes.update');
Route::get('/clientes/buscar', [ClientesController::class, 'buscar'])->name('clientes.buscar');


Route::get('/dashboard/personal', [PersonalController::class, 'index'])->name('personal.index');
Route::get('/dashboard/personal/cargo', [CargoController::class, 'index'])->name('cargo.index');

Route::get('/dashboard/vehiculos', [VehiculoController::class, 'index'])->name('vehiculos.index');
Route::get('/dashboard/vehiculos/create', [VehiculoController::class, 'create'])->name('vehiculos.create');

Route::get('/dashboard/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('/dashboard/roles', [RolesController::class, 'index'])->name('roles.index');
Route::get('/dashboard/permisos', [PermisosController::class, 'index'])->name('permisos.index');

Route::get('/dashboard/marcas', [MarcaController::class, 'index'])->name('marcas.index');
Route::get('/dashboard/tipovehiculo', [tipovehiculoController::class, 'index'])->name('tipovehiculo.index');

Route::get('/dashboard/modelos', [ModeloController::class, 'index'])->name('modelos.index');
Route::get('/dashboard/modelos/create', [ModeloController::class, 'create'])->name('modelos.create');
Route::get('/dashboard/modelos/edit/{modelo}', [ModeloController::class, 'edit'])->name('modelos.edit');
Route::post('/dashboard/modelos', [ModeloController::class, 'store'])->name('modelos.store');
Route::post('/dashboard/modelos/update/{modelo}', [ModeloController::class, 'update'])->name('modelos.update');

Route::get('/dashboard/bitacora', [bitacoraController::class, 'index'])->name('bitacora.index');
Route::get('/dashboard/proveedor',[proveedorController::class,'index'])->name('proveedor.index');
Route::get('/dashboard/diagnostico',[diagnosticoController::class,'index'])->name('diagnostico.index');

Route::get('/dashboard/cotizacion', [CotizacionController::class, 'index'])->name('cotizacion.index');
Route::get('/dashboard/cotizacion/create/{id}', [CotizacionController::class, 'create'])->name('cotizacion.create');
Route::get('/dashboard/cotizacion/new', [CotizacionController::class, 'new'])->name('cotizacion.new');
Route::post('/dashboard/cotizacion', [CotizacionController::class, 'store'])->name('cotizacion.store');
Route::delete('/dashboard/cotizacion/delete/{id}', [CotizacionController::class, 'destroy'])->name('cotizacion.delete');
Route::get('/dashboard/cotizacion/{id}', [CotizacionController::class, 'show'])->name('cotizacion.show');
Route::post('/dashboard/cotizacion/update/{id}', [CotizacionController::class, 'update'])->name('cotizacion.update');

Route::post('/{id}', [CotizacionProductoController::class, 'store'])->name('cotizacionProducto.store');
Route::post('/{id}', [CotizacionServicioController::class, 'store'])->name('cotizacionServicio.store');
