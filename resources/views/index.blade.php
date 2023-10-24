<x-layouts.app>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card">

                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <a href="{{ route('auth.index') }}">
                                <span><img src="{{ asset('assets/images/logo-login.png') }}" alt="" height="150"></span>
                            </a>
                            <h2 class="mb-4 mt-0 text-uppercase font-weight-bold"
                                style="color: #1A1A1A; user-select: none;"><span style="color: #780001">Taller</span>
                                Baljeet</h2>
                        </div>

                        <h5 class="auth-title">Iniciar Sesión</h5>

                        @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                            <form method="POST" action="{{ route('auth.login') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="email">Correo Electrónico:</label>
                                    <input class="form-control" name="email" type="email" id="email"
                                        value="{{ old('email') }}" placeholder="Ingrese su correo electrónico"
                                        autofocus>
                                    @error('email')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-1">
                                    <label for="password">Contraseña:</label>
                                    <input class="form-control" name="password" type="password" id="password"
                                        placeholder="Ingrese su contraseña">
                                    @error('password')
                                    <span class="error text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="col-12 text-right">
                                        <p> <a href="#" class="text-muted ml-1">¿Olvidaste tu contraseña?</a></p>
                                    </div>
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-dark btn-block" type="submit"> INGRESAR </button>
                                </div>

                            </form>

                    </div>
                </div>

            </div>
        </div>

    </div>


    @push('js')
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            const loginForm = document.getElementById('loginForm');

            loginForm.addEventListener('submit', function (event) {
                event.preventDefault();

                const email = loginForm.querySelector('[name="email"]').value;
                const password = loginForm.querySelector('[name="password"]').value;

                const url = "{{ env('URL_SERVER_API') }}" + "/login";
                const data = { email, password }; // Datos a enviar en la solicitud

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
