<x-layouts.app>

    <x-layouts.content title="Pagos" subtitle="" name="Pagos">

        <div class="row">
            <div class="col-12">

                <div class="mb-2 d-flex justify-content-between">
                    <div class="form-group">
                        <a href="#" class="btn btn-primary waves-effect waves-light">
                            <i class="fas fa-plus-circle"></i>&nbsp;
                            Nueva Pago
                        </a>
                    </div>
                </div>

                <div class="card-box">
                    <div class="table-responsive">
                        <table id="table-ordenes" class="table table-hover mb-0 dts">
                            <thead class="bg-dark text-center text-white text-nowrap">
                                <tr style="cursor: pointer">
                                    <th scope="col">ID</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Administrativo</th>
                                    <th scope="col">Concepto</th>
                                    <th scope="col">Fecha y Hora</th>
                                    <th scope="col">Monto</th>
                                    <th scope="col">Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @if ($data !== null)
                                @foreach ($data as $orden) --}}
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle" style="width: 120px">
                                        1
                                    </th>
                                    <td class="align-middle">
                                        Pablo Alexis Lijeron Añez
                                    </td>
                                    <td class="align-middle">
                                        Benjamin Condori Vasquez
                                    </td>
                                    <td class="align-middle">
                                        Pago de Cotización
                                    </td>
                                    <td class="align-middle">
                                        05/10/2023 12:00:00
                                    </td>
                                    <td class="align-middle">
                                        180 Bs
                                    </td>
                                    <td class="align-middle">
                                        {{-- <span class="text-danger py-1 px-2 rounded-lg d-inline-block" style="background-color: #f8d7da; width: 90px">Sin pagar</span> --}}
                                        <span class="text-warning py-1 px-2 rounded-lg d-inline-block"
                                        style="background-color: #ffeeba; width: 90px">Pendiente</span>
                                    </td>
                                    <td class="align-middle text-nowrap" style="width: 200px">
                                        <button type="button" title="Pagar"
                                        class="btn btn-sm btn-outline-success"><i class="fas fa-dollar-sign"></i></button>
                                        <button type="button" 
                                        class="btn btn-sm btn-outline-danger"><i class="fas fa-file-pdf"></i></button>
                                    </td>
                                </tr>
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle" style="width: 120px">
                                        2
                                    </th>
                                    <td class="align-middle">
                                        Pablo Alexis Lijeron Añez
                                    </td>
                                    <td class="align-middle">
                                        Benjamin Condori Vasquez
                                    </td>
                                    <td class="align-middle">
                                        Pago de Orden de trabajo
                                    </td>
                                    <td class="align-middle">
                                        07/10/2023 15:45:00
                                    </td>
                                    <td class="align-middle">
                                        350 Bs
                                    </td>
                                    <td class="align-middle">
                                        <span class="text-success py-1 px-2 rounded-lg d-inline-block" style="background-color: #c3e6cb; width: 90px">Pagado</span>
                                    </td>
                                    <td class="align-middle text-nowrap" style="width: 200px">
                                        <button type="button" title="Pagar"
                                        class="btn btn-sm btn-outline-success"><i class="fas fa-dollar-sign"></i></button>
                                        <button type="button" 
                                        class="btn btn-sm btn-outline-danger"><i class="fas fa-file-pdf"></i></button>
                                    </td>
                                </tr>
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle" style="width: 120px">
                                        3
                                    </th>
                                    <td class="align-middle">
                                        Diego Iglesias Godoy
                                    </td>
                                    <td class="align-middle">
                                        Cesar Alejandro Caballero
                                    </td>
                                    <td class="align-middle">
                                        Pago de Orden de trabajo
                                    </td>
                                    <td class="align-middle">
                                        05/11/2023 10:40:00
                                    </td>
                                    <td class="align-middle">
                                        270 Bs
                                    </td>
                                    <td class="align-middle">
                                        <span class="text-warning py-1 px-2 rounded-lg d-inline-block"
                                        style="background-color: #ffeeba; width: 90px">Pendiente</span>
                                    </td>
                                    <td class="align-middle text-nowrap" style="width: 200px">
                                        <button type="button" title="Pagar"
                                        class="btn btn-sm btn-outline-success"><i class="fas fa-dollar-sign"></i></button>
                                        <button type="button" 
                                        class="btn btn-sm btn-outline-danger"><i class="fas fa-file-pdf"></i></button>
                                    </td>
                                </tr>
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle" style="width: 120px">
                                        4
                                    </th>
                                    <td class="align-middle">
                                        Mauricio Banegas Lopez
                                    </td>
                                    <td class="align-middle">
                                        Benjamin Condori Vasquez
                                    </td>
                                    <td class="align-middle">
                                        Pago de Cotización
                                    </td>
                                    <td class="align-middle">
                                        05/11/2023 12:30:00
                                    </td>
                                    <td class="align-middle">
                                        110 Bs
                                    </td>
                                    <td class="align-middle">
                                        <span class="text-success py-1 px-2 rounded-lg d-inline-block" style="background-color: #c3e6cb; width: 90px">Pagado</span>
                                    </td>
                                    <td class="align-middle text-nowrap" style="width: 200px">
                                        <button type="button" title="Pagar"
                                        class="btn btn-sm btn-outline-success"><i class="fas fa-dollar-sign"></i></button>
                                        <button type="button" 
                                        class="btn btn-sm btn-outline-danger"><i class="fas fa-file-pdf"></i></button>
                                    </td>
                                </tr>
                                {{-- @endforeach
                                @else
                                <tr class="text-nowrap text-center">
                                    <td colspan="7" class="align-middle">No hay registros</td>
                                </tr>
                                @endif --}}
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </x-layouts.content>

    {{-- @push('js')
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
    @endpush --}}

</x-layouts.app>
