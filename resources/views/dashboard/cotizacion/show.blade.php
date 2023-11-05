<x-layouts.app>
    <x-layouts.content title="Detalles de la Cotizacion" subtitle="" name="Detalles de la Cotizacion">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                <div class="row">
            <div class="col-md-6">
                <!-- Título de la cotización -->
                <h4>Cotizacion: {{ $cotizacion['id'] }}</h4>
                <hr>
                <p>Fecha y Hora: {{ $cotizacion['fecha'] }}</p>
                <hr>
                <!-- Información del cliente -->
                <p><b>DATOS DEL CLIENTE:</b></p>
                <p>Nombre y apellido: {{ $cliente['nombre'] }} {{ $cliente['apellido'] }}</p>
                <p>CI: {{ $cliente['ci'] }}</p>

                <!-- Información del vehículo -->
                

                <!-- Descripción de la cotización -->
                <p>Descripción: {{ $cotizacion['descripcion'] }}</p>
                <hr>
            </div>
            <div class="col-md-6 text-right">
                <!-- Precio total de la cotización -->
                <h4>Monto Total: {{ $cotizacion['precio'] }}</h4>
                <hr>
                <p> .</p>
                <hr>
                <p><b>DATOS DEL VEHICULO:</b></p>
                <p>Placa: {{ $vehiculo['placa'] }}</p>
                <p>Modelo: {{ $vehiculo['modelo_nombre'] }}</p>
                <p>Marca: {{ $vehiculo['marca_nombre'] }}</p>
                <hr>
            </div>
        </div>

        <!-- Lista de productos -->
        @if(count($productos) > 0)
        <h5>Productos:</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre del Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Precio por Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto['producto_nombre'] }}</td>
                    <td>{{ $producto['producto_cantidad'] }}</td>
                    <td>{{ $producto['producto_precio'] }}</td>
                    <td>{{ $producto['producto_preciototal'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

        <!-- Lista de servicios -->
        @if(count($servicios) > 0)
        <h5>Servicios:</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre del Servicio</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Precio por Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach($servicios as $servicio)
                <tr>
                    <td>{{ $servicio['servicio_nombre'] }}</td>
                    <td>{{ $servicio['servicio_cantidad'] }}</td>
                    <td>{{ $servicio['servicio_precio'] }}</td>
                    <td>{{ $servicio['servicio_preciototal'] }}</td>
                </tr>
                
                @endforeach
            </tbody>
        </table>
        @endif
                </div>
                <a href="javascript:history.back()" class="btn btn-primary">Regresar</a>
            </div>
        </div>
    </x-layouts.content>

    

</x-layouts.app>
