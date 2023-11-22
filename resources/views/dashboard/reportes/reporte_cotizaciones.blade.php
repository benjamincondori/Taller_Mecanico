<x-layouts.app>

    <x-layouts.content title="Reportes" subtitle="Reporte de Cotizaciones" name="Reporte de Cotizaciones">

        <div class="row">
            <div class="col-12">

                <div class="card-box">

                    <div class="row justify-content-center font-weight-bold font-22 mb-2">
                        Reportes de Cotizaciones</div>

                    <hr style="background: rgb(237, 237, 237); height: 1.2px">

                    <form method="post" id="formularioReporte">
                        <div class="row">
                            <div class="col-md-3 px-1">
                                <div class="form-group">
                                    <label for="id_empleado" class="control-label mb-1 pl-1">
                                        <strong>Elige el administrativo</strong>
                                    </label>
                                    <select class="form-control text-truncate" data-toggle="select2" id="id_empleado"
                                        name="id_empleado">
                                        <option value="0">Todos</option>
                                        @foreach ($administrativos as $administrativo)
                                        <option value="{{ $administrativo['id'] }}"
                                        @if ($administrativo['id'] == old('id_empleado')) selected @endif>
                                        {{ $administrativo['nombre'] }} {{ $administrativo['apellido'] }}</option>
                                        @endforeach
                                    </select>
                                    <span id="mensajeAdministrativo" class="error text-danger"></span>
                                </div>
                            </div>

                            <div class="col-md-3 px-1">
                                <div class="form-group">
                                    <label for="id_cliente" class="control-label mb-1 pl-1"><strong>Elige el cliente</strong></label>
                                    <select class="form-control text-truncate" data-toggle="select2" id="id_cliente"
                                        name="id_cliente">
                                        <option value="0">Todos</option>
                                        @foreach ($clientes as $cliente)
                                        <option value="{{ $cliente['id'] }}"
                                        @if ($cliente['id'] == old('id_cliente')) selected @endif>
                                            {{ $cliente['nombre'] }} {{ $cliente['apellido'] }}</option>
                                        @endforeach
                                    </select>
                                    <span id="mensajeCliente" class="error text-danger"></span>
                                </div>
                            </div>

                            <div class="col-md-3 px-1">
                                <div class="form-group">
                                    <label for="id_marca" class="control-label mb-1 pl-1">
                                        <strong>Elige marca del vehículo</strong>
                                    </label>
                                    <select class="form-control text-truncate" data-toggle="select2" id="id_marca"
                                        name="id_marca">
                                        <option value="0">Todos</option>
                                        @foreach ($marcas as $marca)
                                        <option value="{{ $marca['id'] }}"
                                        @if ($marca['id'] == old('id_marca')) selected @endif>{{
                                            $marca['nombre'] }}</option>
                                        @endforeach
                                    </select>
                                    <span id="mensajeMarca" class="error text-danger"></span>
                                </div>
                            </div>

                            <div class="col-md-3 px-1">
                                <div class="form-group">
                                    <label for="id_modelo" class="control-label mb-1 pl-1">
                                        <strong>Elige modelo del vehículo</strong>
                                    </label>
                                    <select class="form-control text-truncate" data-toggle="select2" id="id_modelo"
                                        name="id_modelo">
                                        <option value="0">Todos</option>
                                        @foreach ($modelos as $modelo)
                                        <option value="{{ $modelo['id'] }}"
                                        @if ($modelo['id'] == old('id_modelo')) selected @endif>{{
                                            $modelo['nombre'] }} </option>
                                        @endforeach
                                    </select>
                                    <span id="mensajeModelo" class="error text-danger"></span>
                                </div>
                            </div>

                            <div class="col-md-3 px-1">
                                <div class="form-group">
                                    <label for="id_servicio" class="control-label mb-1 pl-1">
                                        <strong>Elige el servicio</strong>
                                    </label>
                                    <select class="form-control text-truncate" data-toggle="select2" id="id_servicio"
                                        name="id_servicio">
                                        <option value="0">Todos</option>
                                        @foreach ($servicios as $servicio)
                                        <option value="{{ $servicio['id'] }}"
                                        @if ($servicio['id'] == old('id_servicio')) selected @endif>{{
                                            $servicio['nombre'] }}</option>
                                        @endforeach
                                    </select>
                                    <span id="mensajeServicio" class="error text-danger"></span>
                                </div>
                            </div>

                            <div class="col-md-3 px-1">
                                <div class="form-group">
                                    <label for="id_producto" class="control-label mb-1 pl-1">
                                        <strong>Elige el producto</strong>
                                    </label>
                                    <select class="form-control text-truncate" data-toggle="select2" id="id_producto"
                                        name="id_producto">
                                        <option value="0">Todos</option>
                                        @foreach ($productos as $producto)
                                        <option value="{{ $producto['id'] }}"
                                        @if ($producto['id'] == old('id_producto')) selected @endif>{{
                                            $producto['nombre'] }}</option>
                                        @endforeach
                                    </select>
                                    <span id="mensajeProducto" class="error text-danger"></span>
                                </div>
                            </div>

                            <div class="col-md-3 px-1">
                                <label for="fechaDesde" class="control-label mb-1 pl-1">
                                    <strong>Fecha desde</strong>
                                </label>
                                <div class="input-group">
                                    <input type="text" id="fechaDesde" name="fechaDesde"
                                        placeholder="dd/mm/aaaa" class="form-control flatpickr"
                                        value="{{ old('fechaDesde') }}"
                                        style="background: transparent;" readonly>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    </div>
                                </div>
                                <span id="mensajeFechaDesde" class="error text-danger"></span>
                            </div>

                            <div class="col-md-3 px-1">
                                <label for="fechaHasta" class="control-label mb-1 pl-1">
                                    <strong>Fecha hasta</strong>
                                </label>
                                <div class="input-group">
                                    <input type="text" id="fechaHasta" name="fechaHasta"
                                        placeholder="dd/mm/aaaa" class="form-control flatpickr"
                                        value="{{ old('fechaHasta') }}"
                                        style="background: transparent;" readonly>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    </div>
                                </div>
                                <span id="mensajeFechaHasta" class="error text-danger"></span>
                            </div>
                            
                            <div class="col-md-3 px-1">
                                <div class="form-group">
                                    <label for="id_tipo_vehiculo" class="control-label mb-1 pl-1">
                                        <strong>Elige el tipo de vehículo</strong>
                                    </label>
                                    <select class="form-control text-truncate" data-toggle="select2" id="id_tipo_vehiculo"
                                        name="id_tipo_vehiculo">
                                        <option value="0">Todos</option>
                                        @foreach ($tipoVehiculos as $tipo)
                                        <option value="{{ $tipo['id'] }}"
                                        @if ($tipo['id'] == old('id_tipo_vehiculo')) selected @endif>{{
                                            $tipo['nombre'] }}</option>
                                        @endforeach
                                    </select>
                                    <span id="mensajeTipoVehiculo" class="error text-danger"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 px-1 pt-2">
                                <div class="form-group mb-1">
                                    <button type="subtmit" id="btnConsultar"
                                        class="btn btn-dark waves-effect m-l-5 w-100 d-flex align-items-center justify-content-center py-2">
                                        <i class="fas fa-check-square mr-2 font-20"></i>
                                        Consultar
                                    </button>
                                </div>
                            </div>

                            <div class="col-md-3 px-1 pt-2">
                                <div class="form-group mb-1">
                                    <button type="submit" id="btnPdf" class="btn btn-dark waves-effect m-l-5 w-100 d-flex align-items-center justify-content-center py-2" disabled>
                                        <i class="fas fa-file-pdf mr-2 font-20"></i>
                                        Generar PDF
                                    </button>
                                </div>
                            </div>
                        </div>

                        <hr id="dividerDatos" style="display: none; background: rgb(237, 237, 237); height: 1.2px">

                        <div class="row mx-4 mt-4" id="loadingIndicator" style="display: none">
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
                    </form>

                    <div class="table-responsive" id="datos" style="display: none;">
                        <table id="table-cotizaciones" class="table table-bordered table-hover mb-0">
                            <thead class="bg-dark text-center text-white text-nowrap">
                                <tr style="cursor: pointer">
                                    <th scope="col" style="width: 60px;">ID</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Administrativo</th>
                                    <th scope="col">Marca</th>
                                    <th scope="col">Modelo</th>
                                    <th scope="col">Tipo Vehículo</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </x-layouts.content>

    @push('styles')
        <style>
            .container {
                height: 120px;
                width: 100%;
            }

            .loader {
                height: 20px;
                width: 250px;
                position: relative;
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

        <script>
            $(document).ready(function() {
                $('[data-toggle="select2"]').select2({
                    placeholder: "Seleccionar",
                    allowClear: true // Agrega un botón para borrar la selección
                });

                let fechaDesde = $('#fechaDesde');
                let fechaHasta = $('#fechaHasta');

                ocultarMensaje();

                // Manejar el clic en el botón "Consultar"
                $('#btnConsultar').on('click', function (event) {
                    event.preventDefault(); // Evitar el envío del formulario por defecto

                    let success = validarDatos();

                    if (success) {
                        $("#datos").hide();
                        $("#dividerDatos").hide();
                        $("#btnPdf").prop("disabled", true);
                        $("#loadingIndicator").show();

                        let data = {
                            "id_empleado": $('#id_empleado').val(),
                            "id_cliente": $('#id_cliente').val(),
                            "id_marca": $('#id_marca').val(),
                            "id_modelo": $('#id_modelo').val(),
                            "id_tipo_vehiculo": $('#id_tipo_vehiculo').val(),
                            "id_servicio": $('#id_servicio').val(),
                            "id_producto": $('#id_producto').val(),
                            "fechaDesde": ($('#fechaDesde').val()) ? convertirFecha($('#fechaDesde').val()) : null,
                            "fechaHasta": ($('#fechaHasta').val()) ? convertirFecha($('#fechaHasta').val()) : null,
                        };
                        console.log(data);
                        console.log('=====================');

                        const urlApi = "{{ env('URL_SERVER_API') }}";
                        const url = `${urlApi}/reportes-cotizacion`;

                        // Realizar la solicitud fetch
                        fetch(url, {
                            method: 'POST',
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                "Content-Type": "application/json",
                            },
                            body: JSON.stringify(data)
                        })
                        .then(response => response.json())
                        .then(data => {

                            $("#dividerDatos").show();
                            $("#datos").show();
                            $("#loadingIndicator").hide();
                            verificarCampos();

                            // Limpiar la tabla antes de agregar nuevos datos
                            let cotizaciones = data.cotizaciones;
                            console.log(cotizaciones);
                            $('#table-cotizaciones tbody').empty();

                            // Verificar si hay resultados para mostrar
                            if (cotizaciones.length > 0) {
                            // Iterar sobre los datos y agregarlos a la tabla
                                cotizaciones.forEach(cotizacion => {
                                    let row = '<tr class="text-nowrap text-center">';
                                    row += '<th scope="row" class="align-middle">' + cotizacion.id + '</th>';
                                    row += '<td class="align-middle">' + cotizacion.fecha + '</td>';
                                    row += '<td class="align-middle">' + cotizacion.cliente.nombre + ' ' + cotizacion.cliente.apellido + '</td>';
                                    row += '<td class="align-middle">' + cotizacion.empleado.nombre + ' ' + cotizacion.empleado.apellido + '</td>';
                                    row += '<td class="align-middle">' + cotizacion.vehiculo.marca.nombre + '</td>';
                                    row += '<td class="align-middle">' + cotizacion.vehiculo.modelo.nombre + '</td>';
                                    row += '<td class="align-middle">' + cotizacion.vehiculo.tipo_vehiculo.nombre + '</td>';
                                    row += '</tr>';
                                    $('#table-cotizaciones tbody').append(row);
                                });
                            } else {
                                // Mostrar un mensaje si no hay resultados
                                let row = '<tr class="text-nowrap text-center">';
                                row += '<td colspan="7" class="align-middle">No hay registros</td>';
                                row += '</tr>';
                                $('#table-cotizaciones tbody').append(row);
                            }
                        })
                        .catch(error => {
                            console.error('Error en la petición fetch', error);
                        });
                    }
                });
                
                // Manejar el clic en el botón "Generar PDF"
                $('#btnPdf').on('click', function (event) {
                    event.preventDefault(); 
                    generarPDF();
                })
                
                function generarPDF() {
                    // Obtener valores de los campos o variables necesarios
                    const admin = $('#id_empleado').val();
                    const cliente = $('#id_cliente').val();
                    const marca = $('#id_marca').val();
                    const modelo = $('#id_modelo').val();
                    const tipoVehiculo = $('#id_tipo_vehiculo').val();
                    const servicio = $('#id_servicio').val();
                    const producto = $('#id_producto').val();
                    const f1 = ($('#fechaDesde').val()) ? convertirFecha($('#fechaDesde').val()) : null;
                    const f2 = ($('#fechaHasta').val()) ? convertirFecha($('#fechaHasta').val()) : null;
                    
                    // Construir la URL con los parámetros
                    const url = `/dashboard/generar-reporte-cotizaciones/pdf/${admin}/${cliente}/${marca}/${modelo}/${modelo}/${servicio}/${producto}/${f1}/${f2}`;

                    // Redireccionar a la URL construida
                    window.open(url, '_blank');
                }
                
            });
        </script>

        <script>
            function validarDatos() {

                let fechaDesde = $('#fechaDesde');
                let fechaHasta = $('#fechaHasta');
                let administrativo = $('#id_empleado');
                let cliente = $('#id_cliente');
                let marca = $('#id_marca');
                let modelo = $('#id_modelo');
                let tipoVehiculo = $('#id_tipo_vehiculo');
                let servicio = $('#id_servicio');
                let producto = $('#id_producto');

                if (!fechaDesde.val() && !fechaHasta.val() && !administrativo.val() && !cliente.val() && !marca.val() && !modelo.val() && !tipoVehiculo.val() && !servicio.val() && !producto.val()) {
                    $("#mensajeFechaDesde").text("El campo fecha desde es requerido.");
                    $("#mensajeFechaHasta").text("El campo fecha hasta es requerido.");
                    $("#mensajeAdministrativo").text("El campo administrativo es requerido.");
                    $("#mensajeCliente").text("El campo cliente es requerido.");
                    $("#mensajeMarca").text("El campo marca es requerido.");
                    $("#mensajeModelo").text("El campo modelo es requerido.");
                    $("#mensajeTipoVehiculo").text("El campo modelo es requerido.");
                    $("#mensajeServicio").text("El campo servicio es requerido.");
                    $("#mensajeProducto").text("El campo producto es requerido.");
                    return false;
                }
                if (!fechaDesde.val() && !fechaHasta.val()) {
                    $("#mensajeFechaDesde").text("El campo fecha desde es requerido.");
                    $("#mensajeFechaHasta").text("El campo fecha hasta es requerido.");
                    return false;
                }
                if (!fechaDesde.val()) {
                    $("#mensajeFechaDesde").text("El campo fecha desde es requerido.");
                    return false;
                }
                if (!fechaHasta.val()) {
                    $("#mensajeFechaHasta").text("El campo fecha hasta es requerido.");
                    return;
                }
                if (!administrativo.val()) {
                    $("#mensajeAdministrativo").text("El campo administrativo es requerido.");
                    return false;
                }
                if (!cliente.val()) {
                    $("#mensajeCliente").text("El campo cliente es requerido.");
                    return false;
                }
                if (!marca.val()) {
                    $("#mensajeMarca").text("El campo marca es requerido.");
                    return false;
                }
                if (!modelo.val()) {
                    $("#mensajeModelo").text("El campo modelo es requerido.");
                    return false;
                }
                if (!tipoVehiculo.val()) {
                    $("#mensajeTipoVehiculo").text("El campo tipo de vehículo es requerido.");
                    return false;
                }
                if (!servicio.val()) {
                    $("#mensajeServicio").text("El campo servicio es requerido.");
                    return false;
                }
                if (!producto.val()) {
                    $("#mensajeProducto").text("El campo producto es requerido.");
                    return false;
                }
                return true;
            }
        </script>
        
        <script>
            function verificarCampos() {
                let fechaDesde = $('#fechaDesde');
                let fechaHasta = $('#fechaHasta');
                let administrativo = $('#id_empleado');
                let cliente = $('#id_cliente');
                let marca = $('#id_marca');
                let modelo = $('#id_modelo');
                let tipoVehiculo = $('#id_tipo_vehiculo');
                let servicio = $('#id_servicio');
                let producto = $('#id_producto');
                
                if (fechaDesde.val() && fechaHasta.val() && administrativo.val() && cliente.val() && marca.val() && modelo.val() && tipoVehiculo.val() && servicio.val() && producto.val()) {
                    console.log('Todos los campos tienen valor');
                    $("#btnPdf").prop("disabled", false);
                } else {
                    $("#btnPdf").prop("disabled", true);
                    console.log('Falta completar campos');
                }
            }
        </script>

        <script>
            function ocultarMensaje() {
                let fechaDesde = $('#fechaDesde');
                let fechaHasta = $('#fechaHasta');
                let administrativo = $('#id_empleado');
                let cliente = $('#id_cliente');
                let marca = $('#id_marca');
                let modelo = $('#id_modelo');
                let tipoVehiculo = $('#id_tipo_vehiculo');
                let servicio = $('#id_servicio');
                let producto = $('#id_producto');

                administrativo.on('change', function() {
                    if (administrativo.val()) {
                        $("#mensajeAdministrativo").text("");
                    }
                });

                cliente.on('change', function() {
                    if (cliente.val()) {
                        $("#mensajeCliente").text("");
                    }
                });

                marca.on('change', function() {
                    if (marca.val()) {
                        $("#mensajeMarca").text("");
                    }
                });
                
                modelo.on('change', function() {
                    if (modelo.val()) {
                        $("#mensajeModelo").text("");
                    }
                });
                
                tipoVehiculo.on('change', function() {
                    if (tipoVehiculo.val()) {
                        $("#mensajeTipoVehiculo").text("");
                    }
                });

                servicio.on('change', function() {
                    if (servicio.val()) {
                        $("#mensajeServicio").text("");
                    }
                });

                producto.on('change', function() {
                    if (producto.val()) {
                        $("#mensajeProducto").text("");
                    }
                });

                fechaDesde.on('change', function() {
                    if (fechaDesde.val()) {
                        $("#mensajeFechaDesde").text("");
                    }
                });

                fechaHasta.on('change', function() {
                    if (fechaHasta.val()) {
                        $("#mensajeFechaHasta").text("");
                    }
                });
            }
        </script>

        <script>
            function convertirFecha(fecha) {
                // Dividir la fecha en día, mes y año
                let partes = fecha.split('/');
                // Crear una nueva fecha con el formato "aaaa-mm-dd"
                let nuevaFecha = partes[2] + '-' + partes[1] + '-' + partes[0];
                return nuevaFecha;
            }
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
    @endpush

</x-layouts.app>
