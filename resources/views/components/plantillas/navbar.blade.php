<!-- Topbar Start -->
<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#"
                role="button" aria-haspopup="false" aria-expanded="false">
                <img src="assets/images/users/user-1.jpg" alt="user-image" class="rounded-circle">
                <span class="pro-user-name ml-1">
                    @php
                        $user = Auth::user();
                        if (Auth::check() && $user->empleado) {
                            $nombre = $user->empleado->nombres .' '. $user->empleado->apellidos;
                        } else {
                            $nombre = 'Admin';
                        }
                    @endphp
                    {{ $nombre }} &nbsp;<i class="la la-angle-down"></i>
                </span>
            </a>

            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5 class="m-0 text-white">
                        Bienvenido !
                    </h5>
                </div>

                <!-- item-->
                <a href="#" class="dropdown-item notify-item">
                    <i class="fe-user"></i>
                    <span>Mi perfil</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-settings"></i>
                    <span>Configuración</span>
                </a>

                <div class="dropdown-divider"></div>

                <!-- item-->
                {{-- <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="javascript:void(0);" class="dropdown-item notify-item" onclick="this.closest('form').submit()">
                        <i class="fe-log-out"></i>
                        <span>Cerrar Sesión</span>
                    </a>
                </form> --}}

            </div>
        </li>

        <span class="mr-2"></span>

    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="#" class="logo text-center mt-1">
            <span class="logo-lg">
                <img src="assets/images/logo-gym.png" alt="" height="50">
                <!-- <span class="logo-lg-text-light">Xeria</span> -->
            </span>
            <span class="logo-sm">
                <!-- <span class="logo-sm-text-dark">X</span> -->
                <img src="assets/images/logo-gym.png" alt="" height="20">
            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </li>

    </ul>
</div>
<!-- end Topbar -->
