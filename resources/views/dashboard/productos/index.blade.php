<x-layouts.app>

    <x-layouts.content title="Productos" subtitle="" name="Productos">

        <div class="row">
            <div class="col-12">

                <div class="mb-2 d-flex justify-content-between">

                    <div class="form-group">
                        <a href="{{ route('productos.create') }}" class="btn btn-primary waves-effect waves-light">
                            <i class="fas fa-plus-circle"></i>&nbsp;
                            Nuevo Producto
                        </a>
                    </div>

                </div>

                <div class="card-box">

                    <div class="table-responsive">
                        <table id="table-productos" class="table table-hover mb-0 dts">
                            <thead class="bg-dark text-center text-white text-nowrap">
                                <tr style="cursor: pointer">
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Proveedor</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Categoría</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($data as $producto)
                                <tr class="text-center">
                                    <th scope="row" class="align-middle">{{ $producto['id'] }}</th>
                                    <td class="align-middle">{{ $producto['nombre'] }}</td>
                                    <td class="align-middle">{{ $producto['proveedor']['nombre'] }}</td>
                                    <td class="align-middle">
                                        {{ $producto['stock_disponible'] }}
                                    </td>
                                    <td class="align-middle">{{ $producto['precio_venta'] }}</td>
                                    <td class="align-middle">{{ $producto['categoria']['nombre'] }}</td>
                                    <td class="align-middle text-nowrap">
                                        <button type="button" title="Ver" class="btn btn-sm btn-warning"><i
                                                class="fas fa-eye"></i></button>
                                        <a href="{{ route('productos.edit', $producto['id']) }}" title="Editar" class="btn btn-sm btn-primary"><i
                                                class="fas fa-edit"></i></a>
                                        <a href="{{ route('productos.delete', $producto['id']) }}" title="Eliminar" class="btn btn-sm btn-danger"><i
                                                class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                {{-- @if(!$data)
                                    <tr class="text-center">
                                        <th scope="row" class="align-middle">no hay registros</th>
                                    </tr>
                                @else
                                    @foreach ($data as $producto)
                                    <tr class="text-center">
                                        <th scope="row" class="align-middle">{{ $producto['id'] }}</th>
                                        <td class="align-middle">{{ $producto['nombre'] }}</td>
                                        <td class="align-middle">{{ $producto['proveedor']['nombre'] }}</td>
                                        <td class="align-middle">
                                            {{ $producto['stock_disponible'] }}
                                        </td>
                                        <td class="align-middle">{{ $producto['precio_venta'] }}</td>
                                        <td class="align-middle">{{ $producto['categoria']['nombre'] }}</td>
                                        <td class="align-middle text-nowrap">
                                            <button type="button" title="Ver" class="btn btn-sm btn-warning"><i
                                                    class="fas fa-eye"></i></button>
                                            <a href="" title="Editar" class="btn btn-sm btn-primary"><i
                                                    class="fas fa-edit"></i></a>
                                            <a href="" title="Eliminar" class="btn btn-sm btn-danger"><i
                                                    class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif --}}
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </x-layouts.content>

</x-layouts.app>
