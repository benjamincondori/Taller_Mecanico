<form action="{{ route('clientes.store') }}" method="post" id="create-cliente">
    @csrf

    <div id="create-client-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <div class="d-lg-flex align-items-center text-light">
                        <i class="fas fa-user-plus fa-lg d-none d-lg-flex"></i>
                        <h4 class="modal-title text-light">&nbsp;&nbsp; Registrar un Nuevo Cliente</h4>
                    </div>
                    <button type="button" class="close" style="color: gainsboro" data-dismiss="modal"
                        aria-hidden="true">×</button>
                </div>

                <div class="modal-body p-4">
                    {{-- {{ csrf_field() }} --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre" class="control-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="John">
                                @error('nombre')
                                <span class="error text-danger">* {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="apellido" class="control-label">Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Doe">
                                @error('apellido')
                                <span class="error text-danger">* {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email" class="control-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="jhondoe@gmail.com">
                                @error('email')
                                <span class="error text-danger">* {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="direccion" class="control-label">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion"
                                    placeholder="Address">
                                @error('direccion')
                                <span class="error text-danger">* {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ci" class="control-label">Cédula de identidad</label>
                                <input type="number" min="0" class="form-control" id="ci" name="ci"
                                    placeholder="1234567">
                                @error('ci')
                                <span class="error text-danger">* {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telefono" class="control-label">Número
                                    telefónico</label>
                                <input type="number" min="0" class="form-control" id="telefono" name="telefono"
                                    placeholder="77664512">
                                @error('telefono')
                                <span class="error text-danger">* {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Género</label>
                                <div class="custom-control custom-radio">
                                    <input type="radio" value="F" name="customRadio" class="custom-control-input"
                                        id="femenino">
                                    <label for="femenino" class="custom-control-label">Femenino</label>
                                </div>
                                <div class="custom-control custom-radio mt-1">
                                    <input type="radio" value="M" name="customRadio" class="custom-control-input"
                                        id="masculino">
                                    <label for="masculino" class="custom-control-label">Masculino</label>
                                </div>
                            </div>
                            @error('genero')
                            <span class="error text-danger">* {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                {{-- <div class="buttons-form-submit d-flex justify-content-end"> --}}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect mr-1"
                            data-dismiss="modal">Cancelar</button>
                        <button type="submit" href="#" class="btn btn-primary waves-effect waves-light">
                            Guardar
                            <i class="fas fa-spinner fa-spin d-none"></i>
                        </button>
                    </div>

                    {{--
                </div> --}}
            </div>
        </div>
    </div>
</form>