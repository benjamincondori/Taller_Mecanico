<x-layouts.app>

    <x-layouts.content title="Clientes" subtitle="" name="Clientes">

        <div class="row">
            <div class="col-12">
                <div class="card-box">

                    <div class="form-group px-4 pt-2">
                        <i class="fas fa-user-plus fa-2x"></i>
                        <h3 class="fs-1 d-inline-block ml-1">Crear nuevo cliente</h3>
                    </div>

                    <form class="px-4 pt-2 pb-2" action="{{ route('clientes.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre" class="control-label">Nombre</label>
                                    <input type="text" id="nombre" name="nombre"
                                    class="form-control @error('nombre') is-invalid @enderror"
                                        placeholder="John" value="{{ old('nombre') }}" >
                                    @error('nombre')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="apellido" class="control-label">Apellido</label>
                                    <input type="text" id="apellido" name="apellido"
                                    class="form-control @error('apellido') is-invalid @enderror" id="apellido" name="apellido"
                                        placeholder="Doe" value="{{ old('apellido') }}">
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
                                    <input type="email" id="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                        placeholder="jhondoe@gmail.com" value="{{ old('email') }}">
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
                                    <input type="text" id="direccion" name="direccion"
                                    class="form-control @error('direccion') is-invalid @enderror"
                                        placeholder="Address" value="{{ old('direccion') }}">
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
                                    <input type="number" min="0" id="ci" name="ci"
                                    class="form-control @error('ci') is-invalid @enderror"
                                        placeholder="1234567" value="{{ old('ci') }}">
                                    @error('ci')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telefono" class="control-label">Número
                                        telefónico</label>
                                    <input type="number" min="0" id="telefono" name="telefono"
                                    class="form-control @error('telefono') is-invalid @enderror"
                                        placeholder="77664412" value="{{ old('telefono') }}">
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
                                        <input type="radio" value="F" name="genero" class="custom-control-input"
                                            id="femenino" {{ old('genero') === 'F' ? 'checked' : '' }}>
                                        <label for="femenino" class="custom-control-label">Femenino</label>
                                    </div>
                                    <div class="custom-control custom-radio mt-1">
                                        <input type="radio" value="M" name="genero" class="custom-control-input"
                                            id="masculino" {{ old('genero') === 'M' ? 'checked' : '' }}>
                                        <label for="masculino" class="custom-control-label">Masculino</label>
                                    </div>
                                </div>
                                @error('genero')
                                <span class="error text-danger">* {{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group text-right m-b-0">
                            <a href="{{ route('clientes.index') }}" class="btn btn-danger waves-effect m-l-5">
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

        @if(session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
                timer: 5000
            });
        </script>
        @endif

    @endpush

</x-layouts.app>
