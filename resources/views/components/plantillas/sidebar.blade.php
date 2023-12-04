<div class="slimscroll-menu">

    <!--- Sidemenu -->
    <div id="sidebar-menu">

        <ul class="metismenu" id="side-menu">

            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="fas fa-home"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            @if (verificarPermiso('Lista_Usuarios'))
                <li>
                    <a href="{{route('usuarios.index')}}">
                        <i class="fas fa-user-cog"></i>
                        <span> Usuarios </span>
                    </a>
                </li>
            @endif

            @if (verificarPermiso('Lista_Roles') || verificarPermiso('Lista_Permisos')
                || verificarPermiso('Asignar_Permisos'))
                <li>
                    <a href="javascript: void(0);">
                        <i class="fas fa-key"></i>
                        <span> Roles y Permisos </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        @if (verificarPermiso('Lista_Roles'))
                            <li>
                                <a href="{{route('roles.index')}}">Roles</a>
                            </li>
                        @endif
                        @if (verificarPermiso('Lista_Permisos'))
                            <li>
                                <a href="{{route('permisos.index')}}">Permisos</a>
                            </li>
                        @endif
                        @if (verificarPermiso('Asignar_Permisos'))
                            <li>
                                <a href="{{ route('permisos.asignar') }}">Asignar Permisos</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if (verificarPermiso('Lista_Clientes'))
                <li>
                    <a href="{{ route('clientes.index') }}">
                        <i class="fas fa-users"></i>
                        <span> Clientes </span>
                    </a>
                </li>
            @endif

            @if (verificarPermiso('Lista_Empleados') || verificarPermiso('Lista_Puestos'))
                <li>
                    <a href="javascript: void(0);">
                        <i class="fas fa-user-friends"></i>
                        <span> Personal </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        @if (verificarPermiso('Lista_Empleados'))
                            <li>
                                <a href="{{route('personal.index')}}">Listado del Personal</a>
                            </li>
                        @endif
                        @if (verificarPermiso('Lista_Puestos'))
                            <li>
                                <a href="{{route('cargo.index')}}">Cargos</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if (verificarPermiso('Lista_Marcas') || verificarPermiso('Lista_Modelos')
                || verificarPermiso('Lista_TiposVehiculos') || verificarPermiso('Lista_Vehiculos') ||
                verificarPermiso('Lista_EstadoVehiculos'))
                <li>
                    <a href="javascript: void(0);">
                        <i class="fas fa-car"></i>
                        <span> Vehiculos </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        @if (verificarPermiso('Lista_Vehiculos'))
                            <li>
                                <a href="{{ route('vehiculos.index') }}">Listado de Vehiculos</a>
                            </li>
                        @endif
                        @if (verificarPermiso('Lista_Marcas'))
                            <li>
                                <a href="{{ route('marcas.index') }}">Marcas</a>
                            </li>
                        @endif
                        @if (verificarPermiso('Lista_Modelos'))
                            <li>
                                <a href="{{ route('modelos.index') }}">Modelos</a>
                            </li>
                        @endif
                        @if (verificarPermiso('Lista_TiposVehiculos'))
                            <li>
                                <a href="{{ route('tipovehiculo.index') }}">Tipos de Vehiculos</a>
                            </li>
                        @endif
                        @if (verificarPermiso('Lista_EstadoVehiculos'))
                            <li>
                                <a href="{{ route('estadovehiculo.index') }}">Estado de Vehiculos</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif


            @if (verificarPermiso('Lista_Productos') || verificarPermiso('Lista_Servicios')
                || verificarPermiso('Lista_Categorias'))
                <li>
                    <a href="javascript: void(0);">
                        <i class="fas fa-th"></i>
                        <span> Inventario </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        @if (verificarPermiso('Lista_Productos'))
                            <li>
                                <a href="{{ route('productos.index') }}">Productos</a>
                            </li>
                        @endif
                        @if (verificarPermiso('Lista_Servicios'))
                            <li>
                                <a href="{{route('servicios.index')}}">Servicios</a>
                            </li>
                        @endif
                        @if (verificarPermiso('Lista_Categorias'))
                            <li>
                                <a href="{{route('categorias.index')}}">Categorías</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if (verificarPermiso('Lista_Proveedores'))
                <li>
                    <a href="{{route('proveedor.index')}}">
                        <i class="fas fas fa-truck"></i>
                        <span> Proveedores </span>
                    </a>
                </li>
            @endif

            @if (verificarPermiso('Lista_Diagnosticos'))
                <li>
                    <a href="{{route('diagnostico.index')}}">
                        <i class="fas fa-plus-square"></i>
                        <span> Diagnostico </span>
                    </a>
                </li>
            @endif

            @if (verificarPermiso('Lista_Cotizaciones'))
                <li>
                    <a href="{{route('cotizacion.index')}}">
                        <i class=" fas fa-dollar-sign"></i>
                        <span> Cotizaciones </span>
                    </a>
                </li>
            @endif

            <li>
                <a href="{{route('reserva.index')}}">
                    <i class="far fa-calendar-alt"></i>
                    <span> Reservas </span>
                </a>
            </li>

            <li>
                <a href="{{ route('ordentrabajo.index') }}">
                    <i class="fas fa-tools"></i>
                    <span> Ordenes de Trabajo </span>
                </a>
            </li>

            <li>
                <a href="{{route('auxilio.index')}}">
                    <i class="fas fa-clipboard-list"></i>
                    <span> Asistencia Técnica </span>
                </a>
            </li>

            <li>
                <a href="{{route('ventas.index')}}">
                    <i class="fas fa-shopping-cart"></i>
                    <span> Ventas </span>
                </a>
            </li>

            <li>
                <a href="{{ route('pagos.index') }}">
                    <i class="fas fa-donate"></i>
                    <span> Pagos </span>
                </a>
            </li>

            <li>
                <a href="javascript: void(0);">
                    <i class="fas fa-file-alt"></i>
                    <span> Reportes </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    {{-- @if (verificarPermiso('')) --}}
                        <li>
                            <a href="{{ route('reportes.ordenes') }}">Reporte de Ordenes de Trabajo</a>
                        </li>
                    {{-- @endif --}}
                    {{-- @if (verificarPermiso('')) --}}
                        <li>
                            <a href="{{route('reportes.cotizaciones')}}">Reporte de Cotizaciones</a>
                        </li>
                    {{-- @endif --}}
                    {{-- @if (verificarPermiso('')) --}}
                        <li>
                            <a href="{{route('reportes.pagos')}}">Reporte de Pagos</a>
                        </li>
                    {{-- @endif --}}
                </ul>
            </li>

            @if (verificarPermiso('Lista_Bitacoras'))
                <li>
                    <a href="{{route('bitacora.index')}}">
                        <i class="fas fa-history"></i>
                        <span> Bitacora </span>
                    </a>
                </li>
            @endif

        </ul>

    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>

</div>
<!-- Sidebar -left -->
