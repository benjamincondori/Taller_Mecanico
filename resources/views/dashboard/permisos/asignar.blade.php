<x-layouts.app>

    <x-layouts.content title="Asignar Permisos" subtitle="" name="Asignar Permisos">

        <div class="row">
            <div class="col-12">

                <div class="card-box">
                    <div class="d-flex justify-content-between">
                        <div class="col-md-4">
                            <select class="form-control" id="select-rol">
                                <option value="0">Seleccionar Rol</option>
                                @foreach ($roles as $rol)
                                <option value="{{ $rol['id'] }}">{{ $rol['nombre'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="d-flex">
                                <button type="button" id="btn-sincronizar-todos" class="btn btn-success">
                                    <i class="fas fa-check-circle"></i>&nbsp;
                                    Sincronizar todos
                                </button>
                                
                                <button type="button" id="btn-revocar-todos" class="btn btn-danger ml-1">
                                    <i class="fas fa-times-circle"></i>&nbsp;
                                    Revocar todos
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-box">
                    <div class="table-responsive">
                        <table id="table-asignar-permiso" class="table table-hover mb-0 dts">
                            <thead class="bg-dark text-center text-white text-nowrap">
                                <tr style="cursor: pointer">
                                    <th scope="col">ID</th>
                                    <th scope="col">Permiso</th>
                                    {{-- <th scope="col">Roles con el permiso</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permisos as $permiso)
                                <tr class="text-nowrap text-center">
                                    <th scope="row" style="width: 100px" class="align-middle">{{ $permiso['id'] }}</th>
                                    <td class="align-middle">
                                        {{-- <form id="asignar-form" method="post"> --}}
                                        <div class="checkbox checkbox-primary">
                                            <input class="permiso-checkbox" id="{{ $permiso['id'] }}"
                                                value="{{ $permiso['id'] }}" name="{{ $permiso['id'] }}"  data-permiso-id="{{ $permiso['id'] }}" type="checkbox"
                                                disabled>
                                            <label for="{{ $permiso['id'] }}">
                                                {{ $permiso['nombre'] }}
                                            </label>
                                        </div>
                                        {{-- </form> --}}
                                    </td>
                                    {{-- <td class="align-middle text-wrap" style="width: 200px;">{{
                                                $permiso->roles->count() }}</td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </x-layouts.content>

    @push('js')

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const selectRol = document.getElementById('select-rol');
                const checkboxes = document.querySelectorAll('.permiso-checkbox');
                const btnSincronizarTodos = document.getElementById("btn-sincronizar-todos");
                const btnRevocarTodos = document.getElementById("btn-revocar-todos");;
                let lastSelectedRolId = 0;

                selectRol.addEventListener('change', function() {
                    var selectedRolId = selectRol.value;

                    if (selectedRolId === '0') {
                        // Si no se selecciona un rol, deshabilitar los checkboxes
                        checkboxes.forEach(checkbox => {
                            checkbox.checked = false;
                            checkbox.disabled = true;
                        });
                    } else {
                        // Si se selecciona un rol, habilitar los checkboxes
                        // checkboxes.forEach(checkbox => {
                        //     checkbox.disabled = false;
                        // });

                        seleccionarPermisosAsignados(selectedRolId);

                        // Deseleccionar los checkboxes si se cambia el rol
                        if (selectedRolId !== lastSelectedRolId) {
                            checkboxes.forEach(checkbox => {
                                checkbox.checked = false;
                            });
                        }

                        // Actualizar el último rol seleccionado
                        lastSelectedRolId = selectedRolId;
                    }
                });

                checkboxes.forEach(checkbox => {
                    checkbox.addEventListener('click', function() {
                        const permisoId = this.getAttribute('data-permiso-id');
                        const isChecked = this.checked;

                        if (isChecked) {
                            // Llama a una función que asigna el permiso al rol
                            asignarPermiso(permisoId, lastSelectedRolId);
                        } else {
                            // Llama a una función que quita el permiso del rol si es necesario
                            quitarPermiso(permisoId, lastSelectedRolId);
                        }
                    });
                });

                function seleccionarPermisosAsignados(selectedRolId) {
                    obtenerPermisosAsignados(selectedRolId)
                            .then(data => {
                                checkboxes.forEach(function (checkbox) {
                                    checkbox.disabled = false;
                                    const permisoId = checkbox.value;
                                    const permisoAsignado = data.some(permiso => permiso.id == permisoId);
                                    checkbox.checked = permisoAsignado;
                                });
                            })
                            .catch(err => {
                                console.error("Error al obtener permisos:", err);
                            });
                }

                function asignarPermiso(permisoId, rolId) {
                    // Realiza una solicitud POST a la API para asignar el permiso al rol
                    const url = "{{ env('URL_SERVER_API') }}" + "/permisos-asignar";
                    fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            rol_id: rolId,
                            permiso_id: permisoId,
                        }),
                    })
                    .then(response => {
                        if (!response.ok) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Error al asignar el permiso',
                                timer: 3000
                            });
                            throw new Error('Error al asignar el permiso');
                        }
                        Swal.fire({
                            icon: 'success',
                            title: '¡Permiso Asignado!',
                            text: 'El permiso ha sido asignado exitosamente',
                            timer: 3000
                        });
                        return response.json();
                    })
                    .then(data => {
                        // Maneja la respuesta exitosa, por ejemplo, muestra un mensaje al usuario
                        console.log(data.message);
                    })
                    .catch(error => {
                        // Maneja errores, por ejemplo, muestra un mensaje de error al usuario
                        console.error(error);
                    });
                }

                function quitarPermiso(permisoId, rolId) {
                    // Realiza una solicitud POST a la API para asignar el permiso al rol
                    const url = "{{ env('URL_SERVER_API') }}" + "/permisos-desasignar";
                    fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            rol_id: rolId,
                            permiso_id: permisoId,
                        }),
                    })
                    .then(response => {
                        if (!response.ok) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Error al revocar el permiso',
                                timer: 3000
                            });
                            throw new Error('Error al revocar el permiso');
                        }
                        Swal.fire({
                            icon: 'success',
                            title: '¡Permiso Revocado!',
                            text: 'El permiso ha sido revocado exitosamente',
                            timer: 3000
                        });
                        return response.json();
                    })
                    .then(data => {
                        // Maneja la respuesta exitosa, por ejemplo, muestra un mensaje al usuario
                        console.log(data.message);
                    })
                    .catch(error => {
                        // Maneja errores, por ejemplo, muestra un mensaje de error al usuario
                        console.error(error);
                    });
                }

                function obtenerPermisosAsignados(rolId) {
                    const urlApi = "{{ env('URL_SERVER_API') }}";
                    const url = `${urlApi}/permisos-obtener/${rolId}`;

                    return fetch(url)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error("Error en la solicitud");
                            }
                            return response.json();
                        })
                        .catch(error => {
                            console.error("Error al obtener permisos:", error);
                            return [];
                        });
                }

                btnSincronizarTodos.addEventListener("click", function (event) {
                    event.preventDefault();

                    const rolId = selectRol.value;

                    // Verifica si se ha seleccionado un rol válido
                    if (rolId !== "0") {
                        // Envía una solicitud al servidor API para asignar todos los permisos al rol
                        const urlApi = "{{ env('URL_SERVER_API') }}";
                        const url = `${urlApi}/permisos-asignarTodos/${rolId}`;
                        fetch(url, {
                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                "Content-Type": "application/json",
                            },
                        })
                            .then((response) => {
                                if (response.ok) {
                                    seleccionarPermisosAsignados(rolId);
                                    Swal.fire({
                                        icon: 'success',
                                        title: '¡Permisos Asignados!',
                                        text: 'Los permisos han sido sincronizados exitosamente',
                                        timer: 3000
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'Error al sincronizar los permisos',
                                        timer: 3000
                                    });
                                }
                            })
                            .catch((error) => {
                                console.error(error);
                                alert("Error al asignar permisos.");
                            });
                    } else {
                        Swal.fire({
                            icon: 'info',
                            title: 'Oops...',
                            text: 'Debes seleccionar un rol válido antes de sincronizar los permisos',
                            timer: 3000
                        });
                    }
                });

                btnRevocarTodos.addEventListener("click", function (event) {
                    event.preventDefault();

                    const rolId = selectRol.value;

                    // Verifica si se ha seleccionado un rol válido
                    if (rolId !== "0") {
                        // Envía una solicitud al servidor API para asignar todos los permisos al rol
                        const urlApi = "{{ env('URL_SERVER_API') }}";
                        const url = `${urlApi}/permisos-desasignarTodos/${rolId}`;
                        fetch(url, {
                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                "Content-Type": "application/json",
                            },
                        })
                            .then((response) => {
                                if (response.ok) {
                                    seleccionarPermisosAsignados(rolId);
                                    Swal.fire({
                                        icon: 'success',
                                        title: '¡Permisos Revocados!',
                                        text: 'Los permisos han sido revocados exitosamente',
                                        timer: 3000
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'Error al revocar los permisos',
                                        timer: 3000
                                    });
                                }
                            })
                            .catch((error) => {
                                console.error(error);
                                alert("Error al revocar permisos.");
                            });
                    } else {
                        Swal.fire({
                            icon: 'info',
                            title: 'Oops...',
                            text: 'Debes seleccionar un rol válido antes de revocar permisos',
                            timer: 3000
                        });
                    }
                });
            });
        </script>
    @endpush

</x-layouts.app>
