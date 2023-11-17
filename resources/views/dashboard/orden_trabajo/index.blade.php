<x-layouts.app>

    <x-layouts.content title="Ordenes de trabajo" subtitle="" name="Ordenes de Trabajo">

        <div class="row">
            <div class="col-12">

                <div class="mb-2 d-flex justify-content-between">
                    <div class="form-group">
                        <a href="{{ route('ordentrabajo.create') }}" class="btn btn-primary waves-effect waves-light">
                            <i class="fas fa-plus-circle"></i>&nbsp;
                            Nueva Orden de Trabajo
                        </a>
                    </div>
                </div>

                <div class="card-box">
                    <div class="table-responsive">
                        <table id="table-ordenes" class="table table-hover mb-0 dts">
                            <thead class="bg-dark text-center text-white text-nowrap">
                                <tr style="cursor: pointer">
                                    <th scope="col">Orden</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Placa Vehiculo</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Pago</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($data !== null)
                                @foreach ($data as $orden)
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle" style="width: 120px">
                                        {{ $orden['id'] }}
                                    </th>
                                    <td class="align-middle">
                                        <select name="estado" id="estado_{{ $orden['id'] }}" class="small p-1 uppercase" style="background-color: #B5B3B3; border: none; background-image: none; border-outline: none; outline: none; border-radius: 7px; appearance: none; text-align: center; color: white; text-transform: uppercase; font-weight: bold;" onchange="actualizarEstado('{{ $orden['id'] }}')">
                                            <option value="Ingresado"
                                                @if ($orden['estado'] == 'Ingresado') selected @endif>
                                                Ingresado
                                            </option>
                                            <option value="En proceso"
                                                @if ($orden['estado'] == 'En proceso') selected @endif>
                                                En proceso
                                            </option>
                                            <option value="Esperando repuesto"
                                                @if ($orden['estado'] == 'Esperando repuesto') selected @endif>
                                                Esperando repuesto
                                            </option>
                                            <option value="Reparado"
                                                @if ($orden['estado'] == 'Reparado') selected @endif>
                                                Reparado
                                            </option>
                                            <option value="Entregado"
                                                @if ($orden['estado'] == 'Entregado') selected @endif>
                                                Entregado
                                            </option>
                                        </select>
                                    </td>
                                    <td class="align-middle">
                                        {{ $orden['cotizacion']['cliente']['nombre'] }} {{ $orden['cotizacion']['cliente']['apellido'] }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $orden['cotizacion']['vehiculo']['placa'] }}
                                    </td>
                                    <td class="align-middle">
                                        {{ formatearFecha($orden['fecha_creacion']) }}
                                    </td>
                                    <td class="align-middle">
                                        @if ($orden['pago_id'] == null)
                                            <span class="p-1 bg-danger text-white small"
                                            style="border-radius: 5px; text-transform: uppercase; font-weight: bold">Pendiente</span>
                                        @else
                                            <span class="p-1 bg-success text-white small"
                                            style="border-radius: 5px; text-transform: uppercase; font-weight: bold">Pagado</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-nowrap" style="width: 200px">
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('ordentrabajo.show', $orden['id']) }}" title="Ver" class="btn btn-sm btn-warning">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('ordentrabajo.edit', $orden['id']) }}" title="Editar" class="btn btn-sm btn-primary mx-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form id="formDeleteOrden_{{ $orden['id'] }}"
                                            action="{{route('ordentrabajo.delete', $orden['id']) }}" method="post">
                                                @csrf
                                                <button type="button" title="Eliminar"
                                                onclick="confirmDelete({{ $orden['id'] }})" title="Eliminar" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr class="text-nowrap text-center">
                                    <td colspan="7" class="align-middle">No hay registros</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </x-layouts.content>

    @push('js')
        <script>
            function confirmDelete(id) {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#556ee6',
                    cancelButtonColor: '#f46a6a',
                    confirmButtonText: 'Sí, eliminarlo',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var formId = 'formDeleteOrden_' + id;
                        var form = document.getElementById(formId);
                        form.submit(); // Envía el formulario si el usuario confirma
                    }
                });
            }
        </script>

        <script>
            function actualizarEstado(ordenId) {
                var nuevoEstado = $("#estado_" + ordenId).val();
                const urlApi = "{{ env('URL_SERVER_API') }}";
                const url = `${urlApi}/orden-trabajos/${ordenId}`;
                console.log(nuevoEstado);

                fetch(url, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                    body: JSON.stringify({
                        estado: nuevoEstado,
                    }),
                })
                .then(response => {
                    if (response.ok) {
                        return response.json();
                    } else {
                        throw new Error('Error al actualizar el estado de la orden de trabajo.');
                    }
                })
                .then(data => {
                    console.log(data);
                    Swal.fire({
                        icon: 'success',
                        title: '¡Estado Actualizado!',
                        text: 'El estado de la orden de trabajo ha sido actualizado correctamente.',
                        timer: 1500
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Error al actualizar el estado de la orden de trabajo.',
                        timer: 1500
                    });
                });
            }
        </script>
    @endpush

</x-layouts.app>
