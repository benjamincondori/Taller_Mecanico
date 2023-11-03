@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Lista de Bitácoras</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ID Usuario</th>
                            <th>Usuario</th>
                            <th>IP Usuario</th>
                            <th>Descripción</th>
                            <th>Fecha de Creación</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bitacoras as $bitacora)
                            <tr>
                                <td>{{ $bitacora['id'] }}</td>
                                <td>{{ isset($bitacora['id_usuario']) ? $bitacora['id_usuario'] : 'N/A' }}</td>
                                <td>{{ isset($bitacora['usuario']) ? $bitacora['usuario'] : 'N/A' }}</td>
                                <td>{{ isset($bitacora['ip_usuario']) ? $bitacora['ip_usuario'] : 'N/A' }}</td>
                                <td>{{ isset($bitacora['descripcion']) ? $bitacora['descripcion'] : 'N/A' }}</td>
                                <td>{{ isset($bitacora['created_at']) ? $bitacora['created_at'] : 'N/A' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
