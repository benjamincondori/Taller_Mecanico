<x-layouts.app>

    <x-layouts.content title="Detalle Orden de Trabajo" subtitle="" name="Ordenes de Trabajo">

        <div class="row">
            <div class="col-12">
                <div class="card-box">

                    {{-- <div class="form-group px-4 pt-2">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <i class="fas fa-plus-circle fa-2x"></i>
                                <h3 class="fs-1 d-inline-block ml-1 text-uppercase">
                                    <strong>Orden de Trabajo #{{ $ordenTrabajo['id'] }}</strong>
                                </h3>
                            </div>
                            
                            <div class="d-flex flex-colum align-items-center">
                                <div class="form-group">
                                    <label><strong>Estado Pago: </strong></label>
                                    @if ($ordenTrabajo['pago_id'] == null)
                                        <span class="p-1 bg-danger text-white small"
                                        style="border-radius: 5px; text-transform: uppercase; font-weight: bold">Pendiente</span>
                                    @else
                                        <span class="p-1 bg-success text-white small"
                                        style="border-radius: 5px; text-transform: uppercase; font-weight: bold">Pagado</span>
                                    @endif
                                </div>
                                
                                <div class="form-group">
                                    <label><strong>Estado Orden: </strong></label>
                                    <span class="p-1 bg-success text-white small"
                                    style="border-radius: 5px; text-transform: uppercase; font-weight: bold">
                                    {{ $ordenTrabajo['estado'] }}</span>
                                </div> 
                            </div>
                        </div>
                    </div> --}}
                    
                    <div class="form-group px-4 pt-2">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                {{-- <i class="fas fa-plus-circle fa-2x"></i> --}}
                                <h3 class="fs-1 d-inline-block ml-1 text-uppercase">
                                    <strong>Orden de Trabajo #{{ $ordenTrabajo['id'] }}</strong>
                                </h3>
                            </div>

                            <div class="text-right mt-3">
                                <div class="form-group mb-1">
                                    <label><strong>Estado de Pago: </strong></label>
                                    @if ($ordenTrabajo['pago_id'] == null)
                                        <span class="p-1 bg-danger text-white small"
                                            style="border-radius: 5px; text-transform: uppercase; font-weight: bold">Pendiente</span>
                                    @else
                                        <span class="p-1 bg-success text-white small"
                                            style="border-radius: 5px; text-transform: uppercase; font-weight: bold">Pagado</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label><strong>Estado de la Orden: </strong></label>
                                    <span class="p-1 bg-secondary text-white small"
                                        style="border-radius: 5px; text-transform: uppercase; font-weight: bold">
                                        {{ $ordenTrabajo['estado'] }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <hr class="mx-2" style="border-color: #ced4da">

                    <div class="row px-4 py-3">
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-sm-3">
                                    <ul class="nav nav-pills flex-column navtab-bg nav-justified">
                                        <li class="nav-item mb-1">
                                            <a href="#datos-orden" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                                Datos Orden de Trabajo
                                            </a>
                                        </li>
                                        <li class="nav-item mb-1">
                                            <a href="#datos-cliente" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                Datos del Cliente
                                            </a>
                                        </li>
                                        <li class="nav-item mb-1">
                                            <a href="#datos-vehiculo" data-toggle="tab" aria-expanded="true" class="nav-link">
                                                Datos del Vehiculo
                                            </a>
                                        </li>
                                        <li class="nav-item mb-1">
                                            <a href="#datos-cotizacion" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                Datos de la Cotización
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-9">
                                    <div class="tab-content pt-0">
                                        <div class="tab-pane show active" id="datos-orden">
                                            <div class="col-sm-12">
                                                <div class="d-flex align-items-center">
                                                    <label for="orden_id" class="control-label mr-2" style="width: 120px">
                                                        <strong>Número de Orden:</strong>
                                                    </label>
                                                    <div class="form-group w-100">
                                                        <input type="text" class="form-control" id="orden_id" name="orden_id" value="{{ $ordenTrabajo['id']}}" readonly>
                                                    </div>
                                                </div>

                                                <div class="d-flex align-items-center">
                                                    <label for="fecha" class="control-label mr-2" style="width: 120px">
                                                        <strong>Fecha y Hora de Creación:</strong>
                                                    </label>
                                                    <div class="form-group w-100">
                                                        <input type="text" class="form-control" id="fecha" name="fecha"
                                                        value="{{ formatearFecha($ordenTrabajo['fecha_creacion']) }}" readonly>
                                                    </div>
                                                </div>

                                                <div class="d-flex align-items-center">
                                                    <label for="fecha_inicio" class="control-label mr-2" style="width: 120px">
                                                        <strong>Fecha Ingreso:</strong>
                                                    </label>
                                                    <div class="form-group w-100">
                                                        <input type="text" class="form-control" id="fecha_inicio" name="fecha_inicio"
                                                        value="{{ formatoFecha($ordenTrabajo['fecha_inicio']) }}" readonly>
                                                    </div>
                                                </div>

                                                <div class="d-flex align-items-center">
                                                    <label for="fecha_fin" class="control-label mr-2" style="width: 120px">
                                                        <strong>Fecha Egreso:</strong>
                                                    </label>
                                                    <div class="form-group w-100">
                                                        <input type="text" class="form-control" id="fecha_fin" name="fecha_fin" value="{{ formatoFecha($ordenTrabajo['fecha_fin']) }}"
                                                            readonly>
                                                    </div>
                                                </div>

                                                <div class="d-flex align-items-center">
                                                    <label for="mecanico" class="control-label mr-2" style="width: 120px">
                                                        <strong>Mecánico Asignado:</strong>
                                                    </label>
                                                    <div class="form-group w-100">
                                                        <input type="text" class="form-control" id="mecanico" name="mecanico" value="{{ $ordenTrabajo['empleado']['nombre'] }} {{ $ordenTrabajo['empleado']['apellido'] }}"
                                                            readonly>
                                                    </div>
                                                </div>

                                                <div class="d-flex align-items-center">
                                                    <label for="estado" class="control-label mr-2" style="width: 120px">
                                                        <strong>Estado de la orden:</strong>
                                                    </label>
                                                    <div class="form-group w-100">
                                                        <input type="text" class="form-control" id="estado" name="estado" value="{{ $ordenTrabajo['estado'] }}"
                                                        readonly>
                                                    </div>
                                                </div>
                                                
                                                <div class="d-flex align-items-center">
                                                    <label for="pago" class="control-label mr-2" style="width: 120px">
                                                        <strong>Estado del pago:</strong>
                                                    </label>
                                                    <div class="form-group w-100">
                                                        <input type="text" class="form-control" id="pago" name="pago" value="{{ ($ordenTrabajo['pago_id'] === null) ? 'Pendiente' : 'Pagado' }}"
                                                        readonly>
                                                    </div>
                                                </div>

                                                <div class="d-flex align-items-center">
                                                    <label for="descripcion" class="control-label mr-2" style="width: 120px">
                                                        <strong>Observaciones:</strong>
                                                    </label>
                                                    <div class="form-group w-100">
                                                        <textarea type="text" class="form-control" id="descripcion" name="descripcion" rows="3" readonly>{{ $ordenTrabajo['descripcion'] }}
                                                        </textarea>
                                                    </div>
                                                </div>

                                                <hr class="mx-2" style="border-color: #F0F0F0">

                                                <div id="datosResumen">
                                                    <table id="tablaResumen" class="table table-bordered text-center">
                                                        <thead style="background-color: #3a415a; color:white;">
                                                            <tr>
                                                                <th colspan="2">Resumen</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="pl-5 text-left">Repuestos (productos)</td>
                                                                <td class="pr-5 text-right">{{ 'Bs. ' . formatearNumero(sumaPrecioTotalProductos($productos)) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="pl-5 text-left">Mano de Obra (servicios)</td>
                                                                <td class="pr-5 text-right">
                                                                    {{ 'Bs. ' . formatearNumero(sumaPrecioTotalServicios($servicios)) }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="pl-5 text-left">Subtotal</td>
                                                                <td class="pr-5 text-right">{{ 'Bs. ' . formatearNumero(calcularSubtotal($productos, $servicios)) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="pl-5 text-left">Descuento</td>
                                                                <td class="pr-5 text-right">{{ $ordenTrabajo['descuento'] . ' %' }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="pl-5 text-left"><strong>Total</strong></td>
                                                                <td class="pr-5 text-right"><strong>{{ 'Bs. ' . formatearNumero($ordenTrabajo['costo_total']) }}</strong></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="tab-pane" id="datos-cliente">
                                            <div class="col-sm-12">
                                                <div class="d-flex align-items-center">
                                                    <label for="ci" class="control-label mr-2" style="width: 120px">
                                                        <strong> Cédula de identidad:</strong>
                                                    </label>
                                                    <div class="form-group w-100">
                                                        <input type="text" class="form-control" id="ci" name="ci" value="{{ $ordenTrabajo['cotizacion']['cliente']['ci'] }}" readonly>
                                                    </div>
                                                </div>

                                                <div class="d-flex align-items-center">
                                                    <label for="nombre" class="control-label mr-2" style="width: 120px">
                                                        <strong> Nombre:</strong>
                                                    </label>
                                                    <div class="form-group w-100">
                                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                                        value="{{ $ordenTrabajo['cotizacion']['cliente']['nombre'] }}" readonly>
                                                    </div>
                                                </div>

                                                <div class="d-flex align-items-center">
                                                    <label for="apellido" class="control-label mr-2" style="width: 120px">
                                                        <strong>Apellido:</strong>
                                                    </label>
                                                    <div class="form-group w-100">
                                                        <input type="text" class="form-control" id="apellido" name="apellido" value="{{ $ordenTrabajo['cotizacion']['cliente']['apellido'] }}"
                                                            readonly>
                                                    </div>
                                                </div>

                                                <div class="d-flex align-items-center">
                                                    <label for="telefono" class="control-label mr-2" style="width: 120px">
                                                        <strong>Teléfono:</strong>
                                                    </label>
                                                    <div class="form-group w-100">
                                                        <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $ordenTrabajo['cotizacion']['cliente']['telefono'] }}"
                                                            readonly>
                                                    </div>
                                                </div>

                                                <div class="d-flex align-items-center">
                                                    <label for="direccion" class="control-label mr-2" style="width: 120px">
                                                        <strong>Dirección:</strong>
                                                    </label>
                                                    <div class="form-group w-100">
                                                        <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $ordenTrabajo['cotizacion']['cliente']['direccion'] }}"
                                                            readonly>
                                                    </div>
                                                </div>

                                                <div class="d-flex align-items-center">
                                                    <label for="genero" class="control-label mr-2" style="width: 120px">
                                                        <strong>Género:</strong>
                                                    </label>
                                                    <div class="form-group w-100">
                                                        <input type="text" class="form-control" id="genero" name="genero"
                                                        value="{{ ($ordenTrabajo['cotizacion']['cliente']['genero']) === 'M' ? 'Masculino' : 'Femenino' }}"
                                                            readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="datos-vehiculo">
                                            <div class="col-sm-12">
                                                <div class="d-flex align-items-center">
                                                    <label for="placa" class="control-label mr-2" style="width: 120px">
                                                        <strong>Placa:</strong>
                                                    </label>
                                                    <div class="form-group w-100">
                                                        <input type="text" class="form-control" id="placa" name="placa" value="{{ $ordenTrabajo['cotizacion']['vehiculo']['placa'] }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <label for="nro_chasis" class="control-label mr-2" style="width: 120px">
                                                        <strong>Nro de chasis:</strong>
                                                    </label>
                                                    <div class="form-group w-100">
                                                        <input type="text" class="form-control" id="nro_chasis" name="nro_chasis" value="{{ $ordenTrabajo['cotizacion']['vehiculo']['nro_chasis'] }}"
                                                            readonly>
                                                    </div>
                                                </div>

                                                <div class="d-flex align-items-center">
                                                    <label for="marca" class="control-label mr-2" style="width: 120px">
                                                        <strong>Marca:</strong>
                                                    </label>
                                                    <div class="form-group w-100">
                                                        <input type="text" class="form-control" id="marca" name="marca" value="{{ $ordenTrabajo['cotizacion']['vehiculo']['marca']['nombre'] }}" readonly>
                                                    </div>
                                                </div>

                                                <div class="d-flex align-items-center">
                                                    <label for="modelo" class="control-label mr-2" style="width: 120px">
                                                        <strong>Modelo:</strong>
                                                    </label>
                                                    <div class="form-group w-100">
                                                        <input type="text" class="form-control" id="modelo" name="modelo" value="{{ $ordenTrabajo['cotizacion']['vehiculo']['modelo']['nombre'] }}" readonly>
                                                    </div>
                                                </div>

                                                <div class="d-flex align-items-center">
                                                    <label for="color" class="control-label mr-2" style="width: 120px">
                                                        <strong>Color:</strong>
                                                    </label>
                                                    <div class="form-group w-100">
                                                        <input type="text" class="form-control" id="color" name="color" value="{{ $ordenTrabajo['cotizacion']['vehiculo']['color']}}" readonly>
                                                    </div>
                                                </div>

                                                <div class="d-flex align-items-center">
                                                    <label for="año" class="control-label mr-2" style="width: 120px">
                                                        <strong>Año:</strong>
                                                    </label>
                                                    <div class="form-group w-100">
                                                        <input type="text" class="form-control" id="año" name="año" value="{{ $ordenTrabajo['cotizacion']['vehiculo']['año'] }}" readonly>
                                                    </div>
                                                </div>

                                                <div class="d-flex align-items-center">
                                                    <label for="tipo_vehiculo" class="control-label mr-2" style="width: 120px">
                                                        <strong>Tipo de vehículo:</strong>
                                                    </label>
                                                    <div class="form-group w-100">
                                                        <input type="text" class="form-control" id="tipo_vehiculo" name="tipo_vehiculo"
                                                            value="{{ $ordenTrabajo['cotizacion']['vehiculo']['tipo_vehiculo']['nombre'] }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="datos-cotizacion">
                                            <div class="col-sm-12">
                                                <div class="d-flex align-items-center">
                                                    <label for="cotizacion_id" class="control-label mr-2" style="width: 120px">
                                                        <strong>Número de cotización:</strong>
                                                    </label>
                                                    <div class="form-group w-100">
                                                        <input type="text" class="form-control" id="cotizacion_id" name="cotizacion_id" value="{{ $ordenTrabajo['cotizacion']['id'] }}" readonly>
                                                    </div>
                                                </div>

                                                <div class="d-flex align-items-center">
                                                    <label for="fecha" class="control-label mr-2" style="width: 120px">
                                                        <strong>Fecha y hora:</strong>
                                                    </label>
                                                    <div class="form-group w-100">
                                                        <input type="text" class="form-control" id="fecha" name="fecha" value="{{ formatearFecha($ordenTrabajo['cotizacion']['fecha']) }}"
                                                            readonly>
                                                    </div>
                                                </div>

                                                <div class="d-flex align-items-center">
                                                    <label for="descripcion" class="control-label mr-2" style="width: 120px">
                                                        <strong>Descipción:</strong>
                                                    </label>
                                                    <div class="form-group w-100">
                                                        <textarea type="text" class="form-control" id="descripcion" name="descripcion" rows="3" readonly>{{ $ordenTrabajo['cotizacion']['descripcion'] }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="d-flex align-items-center">
                                                    <label for="monto_total" class="control-label mr-2" style="width: 120px">
                                                        <strong>Monto Total:</strong>
                                                    </label>
                                                    <div class="form-group w-100">
                                                        <input type="text" class="form-control" id="monto_total" name="monto_total" value="{{ 'Bs. ' . $ordenTrabajo['cotizacion']['precio'] }}" readonly>
                                                    </div>
                                                </div>

                                                <hr class="mx-2" style="border-color: #F0F0F0">

                                                <div id="datosProductos">
                                                    @if (count($productos) > 0)
                                                        <label><strong>Productos:</strong></label>
                                                        <table id="tablaProductos" class="table table-bordered text-center">
                                                            <thead style="background-color: #3a415a; color: white;">
                                                                <tr>
                                                                    <th>Nombre del Producto</th>
                                                                    <th>Cantidad</th>
                                                                    <th>Precio Unitario</th>
                                                                    <th>Precio por Cantidad</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($productos as $producto)
                                                                <tr>
                                                                    <td>{{ $producto['nombre'] }}</td>
                                                                    <td>{{ $producto['pivot']['producto_cantidad'] }}</td>
                                                                    <td>{{ 'Bs. ' . $producto['precio_venta'] }}</td>
                                                                    <td>{{ 'Bs. ' . $producto['pivot']['producto_cantidad'] * $producto['precio_venta'] }}</td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    @endif
                                                </div>

                                                <div id="datosServicios">
                                                    @if (count($servicios) > 0)
                                                        <label><strong>Servicios:</strong></label>
                                                        <table id="tablaServicios" class="table table-bordered text-center">
                                                            <thead style="background-color: #3a415a; color:white;">
                                                                <tr>
                                                                    <th>Nombre del Servicio</th>
                                                                    <th>Cantidad</th>
                                                                    <th>Precio Unitario</th>
                                                                    <th>Precio por Cantidad</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($servicios as $servicio)
                                                                <tr>
                                                                    <td>{{ $servicio['nombre'] }}</td>
                                                                    <td>{{ $servicio['pivot']['servicio_cantidad'] }}</td>
                                                                    <td>{{ 'Bs. ' . $servicio['precio'] }}</td>
                                                                    <td>{{ 'Bs. ' . $servicio['pivot']['servicio_cantidad'] * $servicio['precio'] }}</td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>

                    <div class="form-group px-4 text-right m-b-0">
                        <a href="{{ route('ordentrabajo.index') }}" class="btn btn-danger waves-effect m-l-5">
                            Cerrar
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </x-layouts.content>

</x-layouts.app>
