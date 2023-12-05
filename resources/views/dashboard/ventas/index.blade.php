<x-layouts.app>
    <x-layouts.content title="ventas" subtitle="" name="ventas">
        <div class="row">
            <div class="col-12">
                <div class="mb-2 d-flex justify-content-between">
                    <div class="form-group">
                        <a href="{{ route('ventas.new') }}" class="btn btn-primary waves-effect waves-light">
                            <i class="fas fa-plus-circle"></i>&nbsp;
                            Nueva Venta
                        </a>
                    </div>
                </div>
                <div class="card-box">
                    <div class="table-responsive">
                        <table id="table-ventas" class="table table-hover mb-0 dts">
                            <thead class="bg-dark text-center text-white text-nowrap">
                                <tr style="cursor: pointer">
                                    <th scope="col">ID</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Monto Total</th>
                                    <th scope="col">Fecha y Hora</th>
                                    <th scope="col">Estado de Pago</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!$ventas)
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle">No hay ventas</th>
                                </tr>
                                @else
                                @foreach ($ventas as $venta)
                                <tr class="text-nowrap text-center">
                                    <th scope="row" class="align-middle">{{ $venta['id'] }}</th>
                                    <td class="align-middle">{{ $venta['cliente']['nombre'] }}
                                        {{ $venta['cliente']['apellido'] }}
                                    </td>
                                    <td class="align-middle">{{ $venta['monto'] }}</td>
                                    <td class="align-middle">{{ formatearFecha($venta['fecha']) }}</td>
                                    <td class="align-middle">
                                        @if ($venta['pago'] && $venta['pago']['estado'])
                                            <span class="text-success py-1 px-2 rounded-lg d-inline-block"
                                            style="background-color: #d4edda; width: 90px">Pagado</span>
                                        @else
                                            <span class="text-warning py-1 px-2 rounded-lg d-inline-block"
                                            style="background-color: #ffeeba; width: 90px">Pendiente</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-nowrap" style="width: 200px">
                                        <div class="d-flex justify-content-center">
                                            @if (!$venta['pago'])
                                            <a href="{{route('ventas.generarPago', $venta['id'])}}" tittle="GenerarPago" class="btn btn-sm btn-outline-success mx-1">
                                                <i class="fas fa-dollar-sign"></i>
                                            </a>
                                            @endif
                                            <a href="{{ route('ventas.show', $venta['id']) }}" title="Ver detalles" class="btn btn-sm btn-warning mx-1" >
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            @if (!$venta['pago'])
                                           
                                            <a href="{{ route('ventas.create', $venta['id']) }}" title="Editar" class="btn btn-sm btn-primary mx-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            @endif

                                            <form id="formDeleteVenta_{{ $venta['id'] }}"
                                            action="{{route('ventas.delete', $venta['id']) }}" method="post">
                                                @csrf
                                                <button type="button" title="Eliminar"
                                                onclick="confirmDelete({{ $venta['id'] }})" title="Eliminar" class="btn btn-sm btn-danger mx-1">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
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
                        var formId = 'formDeleteVenta_' + id;
                        var form = document.getElementById(formId);
                        form.submit(); // Envía el formulario si el usuario confirma
                    }
                });
            }
        </script>
    @endpush

</x-layouts.app>
