<x-layouts.app>

    <x-layouts.content title="Productos" subtitle="" name="Productos">

        <div class="row">
            <div class="col-12">
                <div class="card-box">

                    <div class="form-group px-4 pt-2">
                        <i class="fas fa-circle-plus fa-2x"></i>
                        <h3 class="fs-1 d-inline-block ml-1">Registrar nuevo producto</h3>
                    </div>

                    <form class="px-4 pt-2 pb-2" action="{{ route('productos.store') }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre" class="control-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                        placeholder="Liquido de freno" value="{{ old('nombre') }}">
                                    @error('nombre')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categoria_id" class="control-label">Categoría</label>
                                    <select class="form-control" name="categoria_id" id="categoria_id">
                                        <option value="">Seleccionar</option>
                                        @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria['id'] }}"
                                        @if ($categoria['id'] == old('categoria_id')) selected @endif>
                                            {{ $categoria['nombre'] }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('categoria_id')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="stock_disponible" class="control-label">Stock disponible</label>
                                    <input type="number" min="0" class="form-control" id="stock_disponible"
                                        name="stock_disponible" placeholder="20" value="{{ old('stock_disponible') }}">
                                    @error('stock_disponible')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="stock_minimo" class="control-label">Stock mínimo</label>
                                    <input type="number" min="0" class="form-control" id="stock_minimo"
                                        name="stock_minimo" placeholder="3" value="{{ old('stock_minimo') }}">
                                    @error('stock_minimo')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="proveedor_id" class="control-label">Proveedor</label>
                                    <select class="form-control" name="proveedor_id" id="proveedor_id">
                                        <option value="">Seleccionar</option>
                                        @foreach ($proveedores as $proveedor)
                                        <option value="{{ $proveedor['id'] }}"
                                        @if ($proveedor['id'] == old('proveedor_id')) selected @endif>
                                            {{ $proveedor['nombre'] }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('proveedor_id')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Precio de venta</label>
                                    <div class="input-group mt-0">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Bs</span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="150,5"
                                            aria-label="Amount (to the nearest dollar)" name="precio_venta"
                                            id="precio_venta" value="{{ old('precio_venta') }}">
                                    </div>
                                    @error('precio_venta')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Precio de compra</label>
                                    <div class="input-group mt-0">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Bs</span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="150,5"
                                            aria-label="Amount (to the nearest dollar)" name="precio_compra"
                                            id="precio_compra" value="{{ old('precio_compra') }}">
                                    </div>
                                    @error('precio_compra')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Subir imagen</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="imagen" id="imagen"
                                                lang="es">
                                            <label class="custom-file-label" for="imagen">Seleccionar imagen</label>
                                        </div>
                                    </div>
                                    @error('imagen')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descripcion" class="control-label">Descripción</label>
                                    <textarea class="form-control" name="descripcion" id="descripcion" rows="5"
                                        placeholder="">{{ old('descripcion') }}</textarea>
                                    @error('descripcion')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-right m-b-0">
                            <a href="{{ route('productos.index') }}" class="btn btn-danger waves-effect m-l-5">
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

    @push('js')
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            const productoForm = document.getElementById('productoForm');

            productoForm.addEventListener('submit', function (event) {
                event.preventDefault();

                const nombre = productoForm.querySelector('[name="nombre"]').value;
                const descripcion = productoForm.querySelector('[name="descripcion"]').value;
                const precio_venta = productoForm.querySelector('[name="precio_venta"]').value;
                const precio_compra = productoForm.querySelector('[name="precio_compra"]').value;
                const categoria_id = productoForm.querySelector('[name="categoria_id"]').value;
                const proveedor_id = productoForm.querySelector('[name="proveedor_id"]').value;
                const stock_disponible = productoForm.querySelector('[name="stock_disponible"]').value;
                const stock_minimo = productoForm.querySelector('[name="stock_minimo"]').value;
                const imagen = productoForm.querySelector('[name="picture"]').value;

                // console.log(nombre, descripcion, precio_venta, precio_compra, categoria_id, proveedor_id, stock_disponible, stock_minimo);

                // console.log(imagen);

                const url = "{{ env('URL_SERVER_API') }}" + "/login";
                const data = { nombre, descripcion, precio_venta, precio_compra, categoria_id, proveedor_id, stock_disponible, stock_minimo, imagen }; // Datos a enviar en la solicitud

                fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(data),
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error de autenticación');
                    }
                    return response.json();
                })
                .then(data => {
                    const token = data.token;
                    localStorage.setItem('token', token);

                    window.location.href = '/dashboard';
                })
                .catch(error => {
                    console.error('Error de autenticación:', error);
                });
            });
        });
    </script> --}}

    @endpush

</x-layouts.app>
