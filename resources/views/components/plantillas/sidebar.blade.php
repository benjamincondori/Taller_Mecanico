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
                <a href="#">
                    <i class="fas fa-user-cog"></i>
                    <span> Usuarios </span>
                </a>
            </li>

            <li>
                <a href="{{ route('clientes.index') }}">
                    <i class="fas fa-user-friends"></i>
                    <span> Clientes </span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-user-friends"></i>
                    <span> Personal </span>
                </a>
            </li>

            <li>
                <a href="javascript: void(0);">
                    <i class="fas fa-user-friends"></i>
                    <span> Vehiculos </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li>
                        <a href="#">Listado de Vehiculos</a>
                    </li>
                    <li>
                        <a href="#">Marcas</a>
                    </li>
                    <li>
                        <a href="#">Modelos</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);">
                    <i class="fas fa-key"></i>
                    <span> Roles y Permisos </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li>
                        <a href="#">Roles</a>
                    </li>
                    <li>
                        <a href="#">Permisos</a>
                    </li>
                    <li>
                        <a href="#">Asignar Permisos</a>
                    </li>
                </ul>
            </li>

        </ul>

    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>

</div>
<!-- Sidebar -left -->
