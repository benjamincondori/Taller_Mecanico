<x-layouts.app>

    <x-layouts.content title="Productos" subtitle="" name="Productos">

        <div class="row">
            <div class="col-12">
                <div class="card-box">

                    <div class="form-group px-4 pt-2">
<<<<<<< HEAD
                        <i class="fas fa-circle-plus fa-2x"></i>
                        <h3 class="fs-1 d-inline-block ml-1">Editar producto</h3>
                    </div>

                    <form class="px-4 pt-2 pb-2" action="{{ route('productos.update',  $producto['id']) }}" method="post" enctype="multipart/form-data">
=======
                        <i class="fas fa-pencil-alt fa-2x"></i>
                        <h3 class="fs-1 d-inline-block ml-1">Editar producto</h3>
                    </div>

                    <form class="px-4 pt-2 pb-2" action="{{ route('productos.update', $producto['id']) }}"
                        method="post">
>>>>>>> benjamin
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre" class="control-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre"
<<<<<<< HEAD
                                        placeholder="Liquido de freno" value="{{ old('nombre', $producto['nombre']) }}">
=======
                                        placeholder="Liquido de freno"
                                        value="{{ old('nombre', $producto['nombre']) }}">
>>>>>>> benjamin
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
<<<<<<< HEAD
                                            <option value="{{ $categoria['id'] }}"
                                                @if ($categoria['id'] == old('categoria_id', $producto['categoria_id']))
                                                selected
                                                @endif
                                            >
=======
                                        <option value="{{ $categoria['id'] }}"
                                        @if ($categoria['id'] == old('categoria_id',
                                        $producto['categoria_id'])) selected @endif>
>>>>>>> benjamin
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
                                        name="stock_disponible" placeholder="20" value="{{ old('stock_disponible', $producto['stock_disponible']) }}">
                                    @error('stock_disponible')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="stock_minimo" class="control-label">Stock mínimo</label>
                                    <input type="number" min="0" class="form-control" id="stock_minimo"
                                        name="stock_minimo" placeholder="3" value="{{ old('stock_minimo', $producto['stock_minimo']) }}">
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
                                        @if ($proveedor['id'] == old('proveedor_id', $producto['proveedor_id'])) selected @endif>
                                            {{ $proveedor['nombre'] }}
                                        </option>
>>>>>>> benjamin
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
<<<<<<< HEAD
                                            aria-label="Amount (to the nearest dollar)" name="precio_venta" id="precio_venta"
                                            value="{{ old('precio_venta', $producto['precio_venta']) }}">
=======
                                            aria-label="Amount (to the nearest dollar)" name="precio_venta"
                                            id="precio_venta" value="{{ old('precio_venta', $producto['precio_venta']) }}">
>>>>>>> benjamin
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
<<<<<<< HEAD
                                            aria-label="Amount (to the nearest dollar)" name="precio_compra" id="precio_compra"
                                            value="{{ old('precio_compra', $producto['precio_compra']) }}">
=======
                                            aria-label="Amount (to the nearest dollar)" name="precio_compra"
                                            id="precio_compra" value="{{ old('precio_compra', $producto['precio_compra']) }}">
>>>>>>> benjamin
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
<<<<<<< HEAD
                                            <input type="file" class="custom-file-input" name="picture" id="imagen" lang="es" >
=======
                                            <input type="file" class="custom-file-input" name="imagen" id="imagen"
                                                lang="es">
>>>>>>> benjamin
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
                                        placeholder="">{{ old('descripcion', $producto['descripcion']) }}</textarea>
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
<<<<<<< HEAD
                                Guardar
=======
                                Actualizar
>>>>>>> benjamin
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </x-layouts.content>

</x-layouts.app>
