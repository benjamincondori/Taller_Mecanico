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
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ServiciosController;
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


Route::get('/dashboard/clientes', [ClientesController::class, 'index'])->name('clientes.index');
Route::get('/dashboard/clientes/create', [ClientesController::class, 'create'])->name('clientes.create');
Route::get('/dashboard/clientes/edit/{id}', [ClientesController::class, 'edit'])->name('clientes.edit');
Route::post('/dashboard/clientes', [ClientesController::class, 'store'])->name('clientes.store');
Route::delete('/dashboard/clientes/delete/{id}', [ClientesController::class, 'destroy'])->name('clientes.delete');
Route::post('/dashboard/clientes/update/{id}', [ClientesController::class, 'update'])->name('clientes.update');
Route::get('/clientes/buscar', [ClientesController::class, 'buscar'])->name('clientes.buscar');

Route::middleware(['auth.admin'])->group(function () {
    Route::get('/logout', function() {
        return back();
    });
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DefaultController::class, 'index'])->name('dashboard');

        Route::get('/vehiculos', [VehiculoController::class, 'index'])->name('vehiculos.index');
        Route::get('/vehiculos/create', [VehiculoController::class, 'create'])->name('vehiculos.create');

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

        Route::controller(CategoriasController::class)->group(function(){
            Route::get('/categorias','index')->name('categorias.index');
            Route::get('/categorias/create','create')->name('categorias.create');
            Route::get('/categorias/edit/{categoria}','edit')->name('categorias.edit');
            
            Route::post('/categorias','store')->name('categorias.store');
            Route::post('/categorias/update/{categoria}','update')->name('categorias.update');
            Route::get('/categorias/delete/{categoria}','destroy')->name('categorias.destroy'); 
        });

        Route::controller(ServiciosController::class)->group(function(){
            Route::get('/servicios','index')->name('servicios.index');
            Route::get('/servicios/create','create')->name('servicios.create');
            Route::get('/servicios/edit/{servicio}','edit')->name('servicios.edit');
            
            Route::post('/servicios','store')->name('servicios.store');
            Route::post('/servicios/update/{servicio}','update')->name('servicios.update');
            Route::get('/servicios/delete/{servicio}','destroy')->name('servicios.destroy'); 
        });
    });

});
 

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
