<x-layouts.app>

    <x-layouts.content title="Nueva Orden de Trabajo" subtitle="" name="Ordenes de Trabajo">

        <div class="row">
            <div class="col-12">
                <div class="card-box">

                    <div class="form-group px-4 pt-2">
                        <i class="fas fa-plus-circle fa-2x"></i>
                        <h3 class="fs-1 d-inline-block ml-1">Orden de Trabajo</h3>
                    </div>

                    <hr class="mx-2" style="border-color: #ced4da">

                    <form method="post" action="{{ route('ordentrabajo.store') }}">
                        @csrf
                        <div class="row px-4">
                            <div class="col-md-3 px-2 mb-1 mb-md-0">
                                <div class="d-flex flex-md-wrap align-items-center">
                                    <label class="control-label text-nowrap mr-2 w-25">
                                        <strong>Fecha Ingreso:</strong>
                                    </label>
                                    <div class="input-group">
                                        <input type="text" id="fechaIngreso" name="fechaIngreso"
                                            placeholder="dd/mm/aaaa" class="form-control flatpickr"
                                            value="{{ old('fechaIngreso') }}"
                                            style="background: transparent; cursor: pointer" readonly>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                                @error('fechaIngreso')
                                <span class="error text-danger">* {{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-3 px-2 mb-1 mb-md-0">
                                <div class="d-flex flex-md-wrap align-items-center">
                                    <label class="control-label text-nowrap mr-2 w-25">
                                        <strong>Fecha Egreso:</strong>
                                    </label>
                                    <div class="input-group">
                                        <input type="text" id="fechaEgreso" name="fechaEgreso" placeholder="dd/mm/aaaa"
                                            class="form-control flatpickr" value="{{ old('fechaEgreso') }}"
                                            style="background: transparent; cursor: pointer" readonly>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                        </div>
                                    </div>
                                    @error('fechaEgreso')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4 px-2 mb-1 mb-md-0 ml-auto">
                                <div class="form-group">
                                    <div class="d-flex flex-md-wrap align-items-center">
                                        <label for="mecanico_id" class="control-label mr-2 w-25">
                                            <strong>Mecánico:</strong></label>
                                        <select class="form-control" data-toggle="select2" id="mecanico_id"
                                            name="mecanico_id">
                                            <option value="">Seleccionar</option>
                                            @foreach ($mecanicos as $mecanico)
                                            <option value="{{ $mecanico['id'] }}"
                                            @if ($mecanico['id'] == old('mecanico_id')) selected @endif>{{
                                                $mecanico['nombre'] }} {{ $mecanico['apellido'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('mecanico_id')
                                        <span class="error text-danger">* {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="mx-2" style="border-color: #F0F0F0">

                        <div class="row px-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="d-flex flex-md-wrap align-items-center">
                                        <label for="cotizacion_id" class="control-label mr-2">
                                            <strong>Buscar cotización:</strong>
                                        </label>
                                        <select class="form-control" data-toggle="select2" id="cotizacion_id"
                                            name="cotizacion_id" onchange="mostrarDatos()">
                                            <option value="">Seleccionar</option>
                                            @foreach ($cotizaciones as $cotizacion)
                                            <option value="{{ $cotizacion['id'] }}"
                                            @if ($cotizacion['id'] == old('cotizacion_id')) selected @endif>
                                                {{ '#' . $cotizacion['id'] }} &nbsp;&nbsp;&nbsp; {{ 'Cliente: ' .
                                                $cotizacion['cliente']['nombre'] . ' ' . $cotizacion['cliente']['apellido']
                                                }} &nbsp;&nbsp;&nbsp; {{ 'Placa: ' . $cotizacion['vehiculo']['placa'] }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('cotizacion_id')
                                        <span class="error text-danger">* {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="mx-2" id="dividerDatos" style="display: none; border-color: #F0F0F0">

                        <div class="row px-4" id="loadingIndicator" style="display: none;">
                            <div class='container'>
                                <div class='loader'>
                                    <div class='loader--dot'></div>
                                    <div class='loader--dot'></div>
                                    <div class='loader--dot'></div>
                                    <div class='loader--dot'></div>
                                    <div class='loader--dot'></div>
                                    <div class='loader--dot'></div>
                                    <div class='loader--text'></div>
                                </div>
                            </div>
                        </div>

                        <div class="row px-4 mt-2" id="datosCliente" style="display: none;">
                            <div class="col-md-6">
                                <h5 class="mb-2 text-center"><strong>DATOS DEL CLIENTE:</strong></h5>
                                <div class="d-flex align-items-center">
                                    <label for="ci" class="control-label mr-2" style="width: 120px">
                                        <strong> Cédula de identidad:</strong>
                                    </label>
                                    <div class="form-group w-100">
                                        <input type="text" class="form-control" id="ci" name="ci"
                                            value="" readonly>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center">
                                    <label for="nombre" class="control-label mr-2" style="width: 120px">
                                        <strong> Nombre:</strong>
                                    </label>
                                    <div class="form-group w-100">
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                            value="" readonly>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center">
                                    <label for="apellido" class="control-label mr-2" style="width: 120px">
                                        <strong>Apellido:</strong>
                                    </label>
                                    <div class="form-group w-100">
                                        <input type="text" class="form-control" id="apellido" name="apellido"
                                            value="" readonly>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center">
                                    <label for="telefono" class="control-label mr-2" style="width: 120px">
                                        <strong>Teléfono:</strong>
                                    </label>
                                    <div class="form-group w-100">
                                        <input type="text" class="form-control" id="telefono" name="telefono"
                                            value="" readonly>
                                    </div>
                                </div>

                                {{-- <div class="d-flex align-items-center">
                                    <label for="" class="control-label mr-2" style="width: 120px">
                                        <strong>Dirección:</strong>
                                    </label>
                                    <div class="form-group w-100">
                                        <input type="text" class="form-control" id="" name=""
                                            value="{{ $cotizacion['cliente']['direccion'] }}" readonly>
                                    </div>
                                </div> --}}
                            </div>

                            <div class="col-md-6">
                                <h5 class="mb-2 text-center"><strong>DATOS DEL VEHICULO:</strong></h5>
                                <div class="d-flex align-items-center">
                                    <label for="placa" class="control-label mr-2" style="width: 120px">
                                        <strong>Placa:</strong>
                                        </label>
                                    <div class="form-group w-100">
                                        <input type="text" class="form-control" id="placa" name="placa"
                                            value="" readonly>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <label for="nro_chasis" class="control-label mr-2" style="width: 120px">
                                        <strong>Nro de chasis:</strong>
                                    </label>
                                    <div class="form-group w-100">
                                        <input type="text" class="form-control" id="nro_chasis" name="nro_chasis"
                                            value="" readonly>
                                    </div>
                                </div>
                                {{-- <div class="d-flex align-items-center">
                                    <label for="" class="control-label mr-2" style="width: 120px">
                                        <strong>Color:</strong>
                                    </label>
                                    <div class="form-group w-100">
                                        <input type="text" class="form-control" id="" name=""
                                            value="{{ $cotizacion['vehiculo']['color'] }}" readonly>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <label for="" class="control-label mr-2" style="width: 120px">
                                        <strong>Año:</strong>
                                    </label>
                                    <div class="form-group w-100">
                                        <input type="text" class="form-control" id="" name=""
                                            value="{{ $cotizacion['vehiculo']['año'] }}" readonly>
                                    </div>
                                </div> --}}
                                <div class="d-flex align-items-center">
                                    <label for="marca" class="control-label mr-2" style="width: 120px">
                                        <strong>Marca:</strong>
                                    </label>
                                    <div class="form-group w-100">
                                        <input type="text" class="form-control" id="marca" name="marca"
                                            value="" readonly>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <label for="modelo" class="control-label mr-2" style="width: 120px">
                                        <strong>Modelo:</strong>
                                    </label>
                                    <div class="form-group w-100">
                                        <input type="text" class="form-control" id="modelo" name="modelo"
                                            value="" readonly>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <label for="tipo_vehiculo" class="control-label mr-2" style="width: 120px">
                                        <strong>Tipo de vehículo:</strong>
                                    </label>
                                    <div class="form-group w-100">
                                        <input type="text" class="form-control" id="tipo_vehiculo" name="tipo_vehiculo"
                                            value="" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mx-4" id="datosProductos" style="display: none;">
                            <!-- Lista de productos -->
                            <h5><strong>Productos:</strong></h5>
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
                                </tbody>
                            </table>
                        </div>

                        <div class="row mx-4" id="datosServicios" style="display: none;">
                            <!-- Lista de servicios -->
                            <h5><strong>Servicios:</strong></h5>
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
                                </tbody>
                            </table>
                        </div>

                        <div class="row mx-4" id="datosResumen" style="display: none;">
                            <div class="col-md-6 pl-0">
                                <table id="tablaResumen" class="table table-bordered text-center">
                                    <thead style="background-color: #3a415a; color:white;">
                                        <tr>
                                            <th colspan="2">Resumen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <input type="hidden" id="costo_total" name="costo_total">
                                </table>
                            </div>
                        </div>

                        <hr class="mx-2" style="border-color:#F0F0F0">

                        {{-- <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ci" class="control-label">Cédula de Identidad</label>
                                    <input type="text" class="form-control @error('ci') is-invalid @enderror" id="ci"
                                        name="ci" placeholder="1234567" value="{{ old('ci') }}">
                                    @error('ci')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telefono" class="control-label">Teléfono</label>
                                    <input type="text" class="form-control @error('telefono') is-invalid @enderror"
                                        id="telefono" name="telefono" placeholder="77445318"
                                        value="{{ old('telefono') }}">
                                    @error('telefono')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="puesto_id" class="control-label">Puesto</label>
                                    <select class="form-control @error('puesto_id') is-invalid @enderror" id="puesto_id"
                                        name="puesto_id">
                                        <option value="">Seleccionar</option>
                                        @foreach ($puestos as $puesto)
                                        <option value="{{ $puesto['id'] }}" @if ($puesto['id']==old('puesto_id'))
                                            selected @endif>{{ $puesto['nombre'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('puesto_id')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rol_id" class="control-label">Rol</label>
                                    <select class="form-control @error('rol_id') is-invalid @enderror" id="rol_id"
                                        name="rol_id">
                                        <option value="">Seleccionar</option>
                                        @foreach ($roles as $rol)
                                        <option value="{{ $rol['id'] }}" @if ($rol['id']==old('rol_id')) selected
                                            @endif>{{ $rol['nombre'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('rol_id')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Género</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" value="F" name="genero" class="custom-control-input"
                                            id="femenino" {{ old('genero')==='F' ? 'checked' : '' }}>
                                        <label for="femenino" class="custom-control-label">Femenino</label>
                                    </div>
                                    <div class="custom-control custom-radio mt-1">
                                        <input type="radio" value="M" name="genero" class="custom-control-input"
                                            id="masculino" {{ old('genero')==='M' ? 'checked' : '' }}>
                                        <label for="masculino" class="custom-control-label">Masculino</label>
                                    </div>
                                    @error('genero')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div> --}}

                        <div class="row px-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descripcion" class="control-label">
                                        <strong>Descripción:</strong>
                                    </label>
                                    <textarea class="form-control" name="descripcion" id="descripcion" rows="5"
                                        placeholder="">{{ old('descripcion') }}</textarea>
                                    @error('descripcion')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group px-4 text-right m-b-0">
                            <a href="{{ route('ordentrabajo.index') }}" class="btn btn-danger waves-effect m-l-5">
                                Cancelar
                            </a>
                            <button class="btn btn-primary waves-effect waves-light" type="submit">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </x-layouts.content>

    @push('styles')
        <style>
            .container {
                height: 120px;
                width: 100px;
            }

            .loader {
                height: 20px;
                width: 250px;
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
            }
            .loader--dot {
                animation-name: loader;
                animation-timing-function: ease-in-out;
                animation-duration: 3s;
                animation-iteration-count: infinite;
                height: 20px;
                width: 20px;
                border-radius: 100%;
                background-color: black;
                position: absolute;
                border: 2px solid white;
            }
            .loader--dot:first-child {
                background-color: #8cc759;
                animation-delay: 0.5s;
            }
            .loader--dot:nth-child(2) {
                background-color: #8c6daf;
                animation-delay: 0.4s;
            }
            .loader--dot:nth-child(3) {
                background-color: #ef5d74;
                animation-delay: 0.3s;
            }
            .loader--dot:nth-child(4) {
                background-color: #f9a74b;
                animation-delay: 0.2s;
            }
            .loader--dot:nth-child(5) {
                background-color: #60beeb;
                animation-delay: 0.1s;
            }
            .loader--dot:nth-child(6) {
                background-color: #fbef5a;
                animation-delay: 0s;
            }
            .loader--text {
                position: absolute;
                top: 200%;
                left: 0;
                right: 0;
                width: 4rem;
                margin: auto;
            }
            .loader--text:after {
                content: "Cargando";
                font-weight: bold;
                animation-name: loading-text;
                animation-duration: 3s;
                animation-iteration-count: infinite;
            }

            @keyframes loader {
                15% {
                    transform: translateX(0);
                }
                45% {
                    transform: translateX(230px);
                }
                65% {
                    transform: translateX(230px);
                }
                95% {
                    transform: translateX(0);
                }
            }
            @keyframes loading-text {
                0% {
                    content: "Cargando";
                }
                25% {
                    content: "Cargando.";
                }
                50% {
                    content: "Cargando..";
                }
                75% {
                    content: "Cargando...";
                }
            }
        </style>
    @endpush

    @push('js')
    <script src="{{ asset('assets/plugins/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/libs/dropzone/dropzone.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('[data-toggle="select2"]').select2({
                placeholder: "Seleccionar",
                allowClear: true // Agrega un botón para borrar la selección
            });

            // Asigna el valor actual del select
            let cotizacionSeleccionada = $("#cotizacion_id").val();

            // Llama a la función mostrarDatos con el valor actual
            if (cotizacionSeleccionada) {
                mostrarDatos();
            }
        });
    </script>

    <script>
        $('.selectpicker').selectpicker();
    </script>

    <script>
        flatpickr(".flatpickr", {
                enableTime: false,
                dateFormat: 'd/m/Y',
                locale: {
                    firstDayofWeek: 1,
                    weekdays: {
                        shorthand: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
                        longhand: [
                        "Domingo",
                        "Lunes",
                        "Martes",
                        "Miércoles",
                        "Jueves",
                        "Viernes",
                        "Sábado",
                        ],
                    },
                    months: {
                        shorthand: [
                        "Ene",
                        "Feb",
                        "Mar",
                        "Abr",
                        "May",
                        "Jun",
                        "Jul",
                        "Ago",
                        "Sep",
                        "Oct",
                        "Nov",
                        "Dic",
                        ],
                        longhand: [
                        "Enero",
                        "Febrero",
                        "Marzo",
                        "Abril",
                        "Mayo",
                        "Junio",
                        "Julio",
                        "Agosto",
                        "Septiembre",
                        "Octubre",
                        "Noviembre",
                        "Diciembre",
                        ],
                    },
                }
            });
    </script>

    <script>
        function mostrarDatos() {
            var cotizacionSeleccionada = $("#cotizacion_id").val();
            let productos;
            let servicios;

            if (cotizacionSeleccionada) {

                // Mostrar el indicador de carga
                $("#datosCliente").hide();
                $("#datosProductos").hide();
                $("#datosServicios").hide();
                $("#dividerDatos").hide();
                $("#datosResumen").hide();
                $("#loadingIndicator").show();

                const urlApi = "{{ env('URL_SERVER_API') }}";
                const url = `${urlApi}/cotizaciones/${cotizacionSeleccionada}`;

                console.log(cotizacionSeleccionada);

                //Realizar petición AJAX
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);

                        // Actualizar los campos con la información recibida
                        $("#ci").val(data.cliente.ci);
                        $("#nombre").val(data.cliente.nombre);
                        $("#apellido").val(data.cliente.apellido);
                        $("#telefono").val(data.cliente.telefono);

                        $("#placa").val(data.vehiculo.placa);
                        $("#nro_chasis").val(data.vehiculo.nro_chasis);
                        $("#marca").val(data.vehiculo.marca_nombre);
                        $("#modelo").val(data.vehiculo.modelo_nombre);
                        $("#tipo_vehiculo").val(data.vehiculo.tipo_vehiculo_nombre);

                        productos = data.productos;
                        servicios = data.servicios;

                        // console.log(productos);
                        // console.log(servicios);

                        // Actualizar la tabla de productos, servicios y resumen
                        actualizarTablaProductos(productos);
                        actualizarTablaServicios(servicios);
                        actualizarTablaResumen(productos, servicios);
                    },
                    error: function (error) {
                        console.error('Error:', error);
                    },
                    complete: function () {
                        // Ocultar el indicador de carga después de recibir la respuesta (ya sea éxito o error)
                        $("#loadingIndicator").hide();
                        $("#dividerDatos").show();
                        // Mostrar los datos del cliente después de ocultar el indicador de carga
                        $("#datosCliente").show();

                        if (productos.length > 0) {
                            $("#datosProductos").show();
                        }
                        if (servicios.length > 0) {
                            $("#datosServicios").show();
                        }

                        $("#datosResumen").show();
                    }
                });
            } else {
                // Ocultar el indicador de carga si no hay cotización seleccionada
                $("#loadingIndicator").hide();
                $("#dividerDatos").hide();
                // Ocultar los datos del cliente si no hay cotización seleccionada
                $("#datosCliente").hide();
                $("#datosProductos").hide();
                $("#datosServicios").hide();
                $("#datosResumen").hide();
            }
        }

        // Función para actualizar la tabla de productos
        function actualizarTablaProductos(productos) {
            // Limpiar la tabla actual
            $("#tablaProductos tbody").empty();

            // Verificar si hay productos
            if (productos.length > 0) {
                // Recorrer los productos y agregar filas a la tabla
                productos.forEach(function (producto) {
                    var fila = $("<tr>");
                    fila.append($("<td>").text(producto.producto_nombre));
                    fila.append($("<td>").text(producto.producto_cantidad));
                    fila.append($("<td>").text(producto.producto_precio));
                    fila.append($("<td>").text(producto.producto_preciototal));

                    $("#tablaProductos tbody").append(fila);
                });
            }
        }

        // Función para actualizar la tabla de servicios
        function actualizarTablaServicios(servicios) {
            // Limpiar la tabla actual
            $("#tablaServicios tbody").empty();

            // Verificar si hay servicios
            if (servicios.length > 0) {
                // Recorrer los servicios y agregar filas a la tabla
                servicios.forEach(function (servicio) {
                    var fila = $("<tr>");
                    fila.append($("<td>").text(servicio.servicio_nombre));
                    fila.append($("<td>").text(servicio.servicio_cantidad));
                    fila.append($("<td>").text(servicio.servicio_precio));
                    fila.append($("<td>").text(servicio.servicio_preciototal));

                    $("#tablaServicios tbody").append(fila);
                });
            }
        }

        // Función para actualizar la tabla de resumen
        function actualizarTablaResumen(productos, servicios) {

            const sumaPreciosProductos = sumaPrecioTotalProductos(productos);
            const sumaPreciosServicios = sumaPrecioTotalServicios(servicios);
            const subtotal = parseFloat(sumaPreciosProductos + sumaPreciosServicios);
            let descuento = 0;
            let total = calcularMontoTotal(subtotal, descuento);
            $("#costo_total").val(total);

            console.log(sumaPreciosProductos);
            console.log(sumaPreciosServicios);
            console.log(subtotal);

            // Limpiar la tabla actual
            $("#tablaResumen tbody").empty();

            let fila1 = $("<tr>");
            fila1.append($("<td class='text-left w-50'>").text("Repuestos"));
            fila1.append($("<td class='text-right w-50'>").text(`Bs. ${sumaPreciosProductos}`));

            let fila2 = $("<tr>");
            fila2.append($("<td class='text-left w-50'>").text("Mano de obra"));
            fila2.append($("<td class='text-right w-50'>").text(`Bs. ${sumaPreciosServicios}`));

            let fila3 = $("<tr>");
            fila3.append($("<td class='text-left w-50'>").text("Subtotal"));
            fila3.append($("<td class='text-right w-50'>").text(`Bs. ${subtotal}`));

            let fila4 = $("<tr>").css("white-space", "nowrap");

            // Crear input de tipo number
            let inputDescuento = $("<input>")
                .attr({
                    type: "number",
                    id: "descuento",
                    name: "descuento",
                    min: 0,
                    max: 100
                })
                .addClass("form-control ml-1")
                .css("width", "75px");

            inputDescuento.val(descuento);

            // Agregar el evento de escucha al input de descuento
            inputDescuento.on("change", function() {
                // Obtener el nuevo valor del descuento
                nuevoDescuento = parseFloat(inputDescuento.val());

                // Ajustar el descuento si es mayor a 100
                if (isNaN(nuevoDescuento) || nuevoDescuento < 0 || nuevoDescuento > 100) {
                    descuento = 0;
                    $("#descuento").val(descuento);
                } else {
                    descuento = nuevoDescuento;
                }

                // Volver a calcular el total y actualizar la tabla
                total = calcularMontoTotal(subtotal, descuento);
                $("#montoTotal").text(`Bs. ${total}`);
                $("#costo_total").val(total);
            });

            fila4.append($("<td class='text-left w-50'>").text("Descuento"));
            let contenidoDerecha = $("<div>").addClass("d-flex align-items-center justify-content-end");
            contenidoDerecha.append("% ", inputDescuento);
            fila4.append($("<td class='text-right'>").append(contenidoDerecha));

            let fila5 = $("<tr class='font-weight-bold'>");
            fila5.append($("<td class='text-left w-50'>").text("Total"));
            fila5.append($("<td class='text-right w-50' id='montoTotal'>").text(`Bs. ${total}`));

            $("#tablaResumen tbody").append(fila1);
            $("#tablaResumen tbody").append(fila2);
            $("#tablaResumen tbody").append(fila3);
            $("#tablaResumen tbody").append(fila4);
            $("#tablaResumen tbody").append(fila5);

        }

        function sumaPrecioTotalProductos(productos) {
            let sumaPrecios = 0;
            if (productos.length > 0) {
                productos.forEach(function (producto) {
                    sumaPrecios += parseFloat(producto.producto_preciototal);
                });
            }
            return sumaPrecios;
        }

        function sumaPrecioTotalServicios(servicios) {
            let sumaPrecios = 0;
            if (servicios.length > 0) {
                servicios.forEach(function (servicio) {
                    sumaPrecios += parseFloat(servicio.servicio_preciototal);
                });
            }
            return sumaPrecios;
        }

        function calcularMontoTotal(subtotal, descuento) {
            const descuentoDecimal = descuento / 100;
            let total = subtotal * (1 - descuentoDecimal);
            total = total % 1 !== 0 ? total.toFixed(2) : parseInt(total);
            return total;
        }
    </script>
    @endpush

</x-layouts.app>
