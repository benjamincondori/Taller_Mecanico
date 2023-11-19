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
use App\Http\Controllers\estadoVehiculoController;
use App\Http\Controllers\ReservasController;
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
    Route::get('/logout', function () {
        return back();
    });
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DefaultController::class, 'index'])->name('dashboard');

        Route::controller(ClientesController::class)->group(function () {
            Route::get('/clientes', 'index')->name('clientes.index');
            Route::get('/clientes/create', 'create')->name('clientes.create');
            Route::get('/clientes/edit/{id}', 'edit')->name('clientes.edit');
            Route::get('/clientes/show/{id}', 'show')->name('clientes.show');
            Route::post('/clientes', 'store')->name('clientes.store');
            Route::post('/clientes/update/{id}', 'update')->name('clientes.update');
            Route::post('/clientes/delete/{id}', 'destroy')->name('clientes.delete');
        });

        Route::controller(ProductoController::class)->group(function () {
            Route::get('/productos', 'index')->name('productos.index');
            Route::get('/productos/create', 'create')->name('productos.create');
            Route::get('/productos/edit/{id}', 'edit')->name('productos.edit');
            Route::get('/productos/show/{id}', 'show')->name('productos.show');
            Route::post('/productos', 'store')->name('productos.store');
            Route::post('/productos/update/{id}', 'update')->name('productos.update');
            Route::post('/productos/delete/{id}', 'destroy')->name('productos.delete');
        });

        Route::controller(PersonalController::class)->group(function () {
            Route::get('/personal', 'index')->name('personal.index');
            Route::get('/personal/create', 'create')->name('personal.create');
            Route::get('/personal/edit/{id}', 'edit')->name('personal.edit');
            Route::get('/personal/show/{id}', 'show')->name('personal.show');
            Route::post('/personal', 'store')->name('personal.store');
            Route::post('/personal/update/{id}', 'update')->name('personal.update');
            Route::post('/personal/delete/{id}', 'destroy')->name('personal.delete');
        });

        Route::controller(CargoController::class)->group(function () {
            Route::get('/cargo', 'index')->name('cargo.index');
            Route::get('/cargo/create', 'create')->name('cargo.create');
            Route::get('/cargo/edit/{id}', 'edit')->name('cargo.edit');
            Route::post('/cargo', 'store')->name('cargo.store');
            Route::post('/cargo/update/{id}', 'update')->name('cargo.update');
            Route::post('/cargo/delete/{id}', 'destroy')->name('cargo.delete');
        });

        Route::controller(VehiculoController::class)->group(function () {
            Route::get('/vehiculos', 'index')->name('vehiculos.index');
            Route::get('/vehiculos/create', 'create')->name('vehiculos.create');
            Route::get('/vehiculos/edit/{id}', 'edit')->name('vehiculos.edit');
            Route::get('/vehiculos/show/{id}', 'show')->name('vehiculos.show');
            Route::post('/vehiculos', 'store')->name('vehiculos.store');
            Route::post('/vehiculos/update/{id}', 'update')->name('vehiculos.update');
            Route::post('/vehiculos/delete/{id}', 'destroy')->name('vehiculos.delete');
        });
        Route::controller(estadoVehiculoController::class)->group(function () {
            Route::get('/estadoVehiculo', 'index')->name('estadoVehiculo.index');
            Route::get('/estadoVehiculo/create', 'create')->name('estadoVehiculo.create');
            Route::get('/estadoVehiculo/edit/{id}', 'edit')->name('estadoVehiculo.edit');
            Route::get('/estadoVehiculo/show/{id}', 'show')->name('estadoVehiculo.show');
            Route::post('/estadoVehiculo', 'store')->name('estadoVehiculo.store');
            Route::post('/estadoVehiculo/update/{id}', 'update')->name('estadoVehiculo.update');
            Route::post('/estadoVehiculo/delete/{id}', 'destroy')->name('estadoVehiculo.delete');
        });

        Route::controller(UsuarioController::class)->group(function () {
            Route::get('/usuarios', 'index')->name('usuarios.index');
            Route::get('/usuarios/edit/{id}', 'edit')->name('usuarios.edit');
            Route::get('/usuarios/show/{id}', 'show')->name('usuarios.show');
            Route::post('/usuarios/update/{id}', 'update')->name('usuarios.update');
            Route::post('/usuarios/delete/{id}', 'destroy')->name('usuarios.delete');
        });

        Route::controller(RolesController::class)->group(function () {
            Route::get('/roles', 'index')->name('roles.index');
            Route::get('/roles/create', 'create')->name('roles.create');
            Route::get('/roles/show/{id}', 'show')->name('roles.show');
            Route::get('/roles/edit/{id}', 'edit')->name('roles.edit');
            Route::post('/roles', 'store')->name('roles.store');
            Route::post('/roles/update/{id}', 'update')->name('roles.update');
            Route::post('/roles/delete/{id}', 'destroy')->name('roles.delete');
        });

        Route::controller(PermisosController::class)->group(function () {
            Route::get('/permisos', 'index')->name('permisos.index');
            Route::get('/permisos/asignar', 'asignar')->name('permisos.asignar');
        });

        Route::controller(MarcaController::class)->group(function () {
            Route::get('/marcas', 'index')->name('marcas.index');
            Route::get('/marcas/create', 'create')->name('marcas.create');
            Route::get('/marcas/edit/{id}', 'edit')->name('marcas.edit');
            Route::post('/marcas', 'store')->name('marcas.store');
            Route::post('/marcas/update/{id}', 'update')->name('marcas.update');
            Route::post('/marcas/delete/{id}', 'destroy')->name('marcas.delete');
        });

        Route::controller(tipovehiculoController::class)->group(function () {
            Route::get('/tipovehiculo', 'index')->name('tipovehiculo.index');
            Route::get('/tipovehiculo/create', 'create')->name('tipovehiculo.create');
            Route::get('/tipovehiculo/edit/{id}', 'edit')->name('tipovehiculo.edit');
            Route::post('/tipovehiculo', 'store')->name('tipovehiculo.store');
            Route::post('/tipovehiculo/update/{id}', 'update')->name('tipovehiculo.update');
            Route::post('/tipovehiculo/delete/{id}', 'destroy')->name('tipovehiculo.delete');
        });

        Route::controller(ModeloController::class)->group(function () {
            Route::get('/modelos', 'index')->name('modelos.index');
            Route::get('/modelos/create', 'create')->name('modelos.create');
            Route::get('/modelos/edit/{id}', 'edit')->name('modelos.edit');
            Route::post('/modelos', 'store')->name('modelos.store');
            Route::post('/modelos/update/{id}', 'update')->name('modelos.update');
            Route::post('/modelos/delete/{id}', 'destroy')->name('modelos.delete');
        });

        Route::get('/bitacora', [bitacoraController::class, 'index'])->name('bitacora.index');

        Route::controller(proveedorController::class)->group(function () {
            Route::get('/proveedor', 'index')->name('proveedor.index');
            Route::get('/proveedor/create', 'create')->name('proveedor.create');
            Route::get('/proveedor/edit/{id}', 'edit')->name('proveedor.edit');
            Route::post('/proveedor', 'store')->name('proveedor.store');
            Route::post('/proveedor/update/{id}', 'update')->name('proveedor.update');
            Route::post('/proveedor/delete/{id}', 'destroy')->name('proveedor.delete');
        });

        Route::controller(CategoriasController::class)->group(function () {
            Route::get('/categorias', 'index')->name('categorias.index');
            Route::get('/categorias/create', 'create')->name('categorias.create');
            Route::get('/categorias/edit/{categoria}', 'edit')->name('categorias.edit');
            Route::post('/categorias', 'store')->name('categorias.store');
            Route::post('/categorias/update/{categoria}', 'update')->name('categorias.update');
            Route::post('/categorias/delete/{categoria}', 'destroy')->name('categorias.delete');
        });

        Route::controller(ServiciosController::class)->group(function () {
            Route::get('/servicios', 'index')->name('servicios.index');
            Route::get('/servicios/create', 'create')->name('servicios.create');
            Route::get('/servicios/edit/{id}', 'edit')->name('servicios.edit');
            Route::post('/servicios', 'store')->name('servicios.store');
            Route::post('/servicios/update/{id}', 'update')->name('servicios.update');
            Route::post('/servicios/delete/{id}', 'destroy')->name('servicios.delete');
        });

        Route::controller(diagnosticoController::class)->group(function () {
            Route::get('/diagnostico', 'index')->name('diagnostico.index');
            Route::get('/diagnostico/create', 'create')->name('diagnostico.create');
            Route::get('/diagnostico/edit/{id}', 'edit')->name('diagnostico.edit');
            Route::get('/diagnostico/show/{id}', 'show')->name('diagnostico.show');
            Route::post('/diagnostico', 'store')->name('diagnostico.store');
            Route::post('/diagnostico/update/{id}', 'update')->name('diagnostico.update');
            Route::post('/diagnostico/delete/{id}', 'destroy')->name('diagnostico.delete');
        });

        Route::controller(CotizacionController::class)->group(function () {
            Route::get('/cotizacion', 'index')->name('cotizacion.index');
            Route::get('/cotizacion/create/{id}', 'create')->name('cotizacion.create');
            Route::get('/cotizacion/show/{id}', 'show')->name('cotizacion.show');
            Route::get('/cotizacion/new', 'new')->name('cotizacion.new');
            Route::post('/cotizacion/store', 'store')->name('cotizacion.store');
            Route::post('/cotizacion/update/{id}', 'update')->name('cotizacion.update');
            Route::post('/cotizacion/delete/{id}', 'destroy')->name('cotizacion.delete');
            Route::post('/cotizacion/storeCotiProducto', 'storeCotiProducto')->name('cotizacion.storeCotiProducto');
            Route::post('/cotizacion', 'storeCotiServicio')->name('cotizacion.storeCotiServicio');
            Route::post('/cotizacion/deleteProducto/{id}/{cotizacion_id}', 'destroyProducto')->name('cotizacion.deleteProducto');
            Route::post('/cotizacion/deleteServicio/{id}/{cotizacion_id}', 'destroyServicio')->name('cotizacion.deleteServicio');
        });

        Route::controller(ReservasController::class)->group(function (){
            Route::get('/reserva','index')->name('reserva.index');
            Route::get('/reserva/create','create')->name('reserva.create');
            Route::post('/reserva','store')->name('reserva.store');
            Route::get('reserva/edit/{reserva}','edit')->name('reserva.edit');
            Route::get('/reserva/show/{id}', 'show')->name('reserva.show');
            Route::post('/reserva/update/{id}', 'update')->name('reserva.update');
            Route::post('/reserva/delete/{id}', 'destroy')->name('reserva.delete');
        });
    });
});
