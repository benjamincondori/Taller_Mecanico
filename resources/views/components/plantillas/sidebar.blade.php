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

            <li>
                <a href="{{ route('clientes.index') }}">
                    <i class="fas fa-user-friends"></i>
                    <span> Clientes </span>
                </a>
            </li>

            <li>
                <a href="{{route('usuarios.index')}}">
                    <i class="fas fa-user-friends"></i>
                    <span> Usuarios </span>
                </a>
            </li>

            <li>
                <a href="javascript: void(0);">
                    <i class="fas fa-user-friends"></i>
                    <span> Personal </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                <li>
                        <a href="{{route('personal.index')}}">Lista de Personal</a>
                    </li>
                    <li>
                        <a href="{{route('cargo.index')}}">Lista de Cargos</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);">
                    <i class="fas fa-car"></i>
                    <span> Vehiculos </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{ route('vehiculos.index') }}">Listado de Vehiculos</a>
                    </li>
                    <li>
                        <a href="{{ route('marcas.index') }}">Marcas</a>
                    </li>
                    <li>
                        <a href="{{ route('modelos.index') }}">Modelos</a>
                    </li>
                    <li>
                        <a href="{{ route('tipovehiculo.index') }}">Tipos de Vehiculos</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{route('diagnostico.index')}}">
                    <i class="far fa-plus-square"></i>
                    <span> Diagnostico </span>
                </a>
            </li>
            <li>
                <a href="{{route('proveedor.index')}}">
                    <i class="fas fa-user-friends"></i>
                    <span> Proveedor </span>
                </a>
            </li>
            <li>
                <a href="{{route('bitacora.index')}}">
                    <i class="fas far fa-clock"></i>
                    <span> Bitacora </span>
                </a>
            </li>
            <li>
                <a href="javascript: void(0);">
                    <i class="fas fa-key"></i>
                    <span> Roles y Permisos </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{route('roles.index')}}">Roles</a>
                    </li>
                    <li>
                        <a href="{{route('permisos.index')}}">Permisos</a>
                    </li>
                    <li>
                        <a href="#">Asignar Permisos</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="{{route('categorias.index')}}">
                    <i class="fas fa-tag"></i>
                    <span> Categorias </span>
                </a>
            </li>
            <li>
                <a href="{{route('servicios.index')}}">
                    <i class="fas fa-wrench"></i>
                    <span>Servicios</span>
                </a>
            </li>

        </ul>

    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>

</div>
<!-- Sidebar -left -->
