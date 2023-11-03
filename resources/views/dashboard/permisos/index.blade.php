<x-layouts.app>

    <x-layouts.content title="Permisos" subtitle="" name="Permisos">

        <div class="row">
            <div class="col-12">

                <div class="card-box">
                    <div class="table-responsive">
                        <table id="table-permiso" class="table table-hover mb-0 dts">
                            <thead class="bg-dark text-center text-white text-nowrap">
                                <tr style="cursor: pointer">
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $permiso)
                                <tr class="text-nowrap text-center">
                                    <th scope="row" style="width: 80px" class="align-middle">{{ $permiso['id'] }}</th>
                                    <td class="align-middle">{{ $permiso['nombre'] }}</th>
                                    <td class="align-middle text-wrap">{{ $permiso['descripcion'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </x-layouts.content>

</x-layouts.app>
