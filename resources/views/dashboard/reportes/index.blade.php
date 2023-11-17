<x-layouts.app>

    <x-layouts.content title="Reportes" subtitle="" name="Reportes">

        <div class="row">
            <div class="col-12">

                <div class="card-box">

                    <div class="row justify-content-center font-weight-bold font-22 mb-2">
                        Reportes de Ordenes de Trabajo</div>

                    <hr style="background: rgb(237, 237, 237); height: 1.2px">

                    <div class="row">

                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label class="control-label mb-1"><strong>Elige el administrativo</strong></label>
                                <select class="form-control text-truncate">
                                    <option value="0">Todos</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label class="control-label mb-1"><strong>Elige el cliente</strong></label>
                                <select class="form-control text-truncate">
                                    <option value="0">Todos</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label class="control-label mb-1"><strong>Elige el tipo de reporte</strong></label>
                                <select class="form-control text-truncate">
                                    <option value="0">Inscripciones del Día</option>
                                    <option value="1">Inscripciones por fecha</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label class="control-label mb-1"><strong>Elige el estado</strong></label>
                                <select class="form-control text-truncate">
                                    <option value="3">Todos</option>
                                    <option value="1">Activa</option>
                                    <option value="0">Vencida</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label class="control-label mb-1"><strong>Fecha desde</strong></label>
                                <input type="text" placeholder="Click para elegir"
                                    class="form-control flatpickr" style="background: transparent; cursor: pointer"
                                    readonly>
                            </div>
                        </div>

                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label class="control-label mb-1"><strong>Fecha hasta</strong></label>
                                <input type="text"  placeholder="Click para elegir"
                                    class="form-control flatpickr" style="background: transparent; cursor: pointer"
                                    readonly>
                            </div>
                        </div>

                    </div>
                    
                    <div class="row">
                        <div class="col-md-3 px-1 pt-2">
                            <div class="form-group mb-1">
                                <button type="button" 
                                    class="btn btn-dark waves-effect m-l-5 w-100 d-flex align-items-center justify-content-center py-2">
                                    <i class="fas fa-check-square mr-2 font-20"></i>
                                    Consultar
                                </button>
                            </div>
                        </div>

                        <div class="col-md-3 px-1 pt-2">
                            <div class="form-group mb-1">
                                <a href=""
                                    target="_blank"  class="btn btn-dark waves-effect m-l-5 w-100 d-flex align-items-center justify-content-center py-2">
                                    <i class="fas fa-file-pdf mr-2 font-20"></i>
                                    Generar PDF
                                </a>
                            </div>
                        </div>
                    </div>

                    <hr style="background: rgb(237, 237, 237); height: 1.2px">

                    <div class="table-responsive">
                        <table id="table-ordenes" class="table table-hover mb-0 dts">
                            <thead class="bg-dark text-center text-white text-nowrap">
                                <tr style="cursor: pointer">
                                    <th scope="col" style="width: 60px;">ID</th>
                                    <th scope="col">Fecha Inscripción</th>
                                    <th scope="col">Fecha Inicio</th>
                                    <th scope="col">Fecha Fin</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Administrativo</th>
                                    <th scope="col">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @if ($data !== null)
                                @foreach ($data as $orden) --}}
                                {{-- <tr class="text-nowrap text-center">
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
                                        <span class="text-warning py-1 px-2 rounded-lg d-inline-block"
                                            style="background-color: #ffeeba; width: 90px">Pendiente</span>
                                    </td>
                                    <td class="align-middle text-nowrap" style="width: 200px">
                                        <button type="button" title="Pagar" class="btn btn-sm btn-outline-success"><i
                                                class="fas fa-dollar-sign"></i></button>
                                        <button type="button" class="btn btn-sm btn-outline-danger"><i
                                                class="fas fa-file-pdf"></i></button>
                                    </td>
                                </tr> --}}
                                {{-- @endforeach
                                @else --}}
                                <tr class="text-nowrap text-center">
                                    <td colspan="7" class="align-middle">No hay registros</td>
                                </tr>
                                {{-- @endif --}}
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