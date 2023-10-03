<x-layouts.app>

    <div id="wrapper">

        @include('components.plantillas.navbar')

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">
            @include('components.plantillas.sidebar')
        </div>
        <!-- Left Sidebar End -->

        <!-- ========================================================== -->
        <!-- Start Page Content here -->
        <!-- ========================================================== -->

        <div class="content-page">
            <div id="content">

                <x-layouts.content title="Dashboard" subtitle="" name="Dashboard">

                    {{-- <div>

                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="avatar-sm bg-soft-purple rounded">
                                                <i class="fe-aperture avatar-title font-22 text-purple"></i>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div class="text-right">
                                                <h3 class="text-dark my-1">Bs&nbsp;<span data-plugin="counterup">
                                                        {{ $this->formatoMoneda($ingresos) }}</span></h3>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="text-right">
                                                <p class="text-muted mb-1 text-truncate">Estado de Ingresos</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <div class="progress progress-sm m-0">
                                            <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="60"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-3">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-sm bg-soft-success rounded">
                                                <i class="fe-shopping-cart avatar-title font-22 text-success"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="text-dark my-1"><span data-plugin="counterup">
                                                        {{ $inscripciones }}</span></h3>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="text-right">
                                                <p class="text-muted mb-1 text-truncate">Inscripciones</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <div class="progress progress-sm m-0">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="49"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-3">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-sm bg-soft-primary rounded">
                                                <i class="fe-users avatar-title font-22 text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="text-dark my-1"><span data-plugin="counterup">
                                                        {{ $clientes }}</span></h3>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="text-right">
                                                <p class="text-muted mb-1 text-truncate">Clientes</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <div class="progress progress-sm m-0">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="18"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-3">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-sm bg-soft-info rounded">
                                                <i class="fe-cpu avatar-title font-22 text-info"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="text-dark my-1"><span data-plugin="counterup">{{
                                                        $entrenadores }}</span></h3>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="text-right">
                                                <p class="text-muted mb-1 text-truncate">Entrenadores</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <div class="progress progress-sm m-0">
                                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="74"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="card-box widget-user">
                                    <img src="assets/images/users/user-1.jpg"
                                        class="img-responsive rounded-circle img-thumbnail" alt="user">
                                    <div class="mt-3">
                                        <h5 class="mb-1">Chadengle</h5>
                                        <p class="text-muted mb-0 font-13">coderthemes@gmail.com</p>
                                        <div class="user-position">
                                            <span
                                                class="text-warning text-uppercase font-13 font-weight-bold">Admin</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-3">
                                <div class="card-box widget-user">
                                    <img src="assets/images/users/user-2.jpg"
                                        class="img-responsive rounded-circle img-thumbnail" alt="user">
                                    <div class="mt-3">
                                        <h5 class="mb-1"> Michael Zenaty</h5>
                                        <p class="text-muted mb-0 font-13">coderthemes@gmail.com</p>
                                        <div class="user-position">
                                            <span class="text-info text-uppercase font-13 font-weight-bold">User</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-3">
                                <div class="card-box widget-user">
                                    <img src="assets/images/users/user-4.jpg"
                                        class="img-responsive rounded-circle img-thumbnail" alt="user">
                                    <div class="mt-3">
                                        <h5 class="mb-1">Stillnotdavid</h5>
                                        <p class="text-muted mb-0 font-13">coderthemes@gmail.com</p>
                                        <div class="user-position">
                                            <span
                                                class="text-success text-uppercase font-13 font-weight-bold">Admin</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-3">
                                <div class="card-box widget-user">
                                    <img src="assets/images/users/user-10.jpg"
                                        class="img-responsive rounded-circle img-thumbnail" alt="user">
                                    <div class="mt-3">
                                        <h5 class="mb-1">Tomaslau</h5>
                                        <p class="text-muted mb-0 font-13">coderthemes@gmail.com</p>
                                        <div class="user-position">
                                            <span class="text-pink text-uppercase font-13 font-weight-bold">User</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!-- Portlet card -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-widgets">
                                            <a href="javascript: void(0);" data-toggle="reload"><i
                                                    class="mdi mdi-refresh"></i></a>
                                            <a data-toggle="collapse" href="#cardCollpase1" role="button"
                                                aria-expanded="false" aria-controls="cardCollpase1"><i
                                                    class="mdi mdi-minus"></i></a>
                                            <a href="javascript: void(0);" data-toggle="remove"><i
                                                    class="mdi mdi-close"></i></a>
                                        </div>
                                        <h4 class="header-title mb-0">Sparkline Charts</h4>

                                        <div id="cardCollpase1" class="collapse pt-3 show" dir="ltr">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div id="spark1" class="apex-charts"></div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div id="spark2" class="apex-charts"></div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div id="spark3" class="apex-charts"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @push('js')

                        <!-- Third Party js-->
                        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>
                        <script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
                        <script src="https://apexcharts.com/samples/assets/series1000.js"></script>
                        <script src="https://apexcharts.com/samples/assets/ohlc.js"></script>

                        <!-- init js -->
                        <script src="assets/js/pages/apexcharts.init.js"></script>

                        @endpush

                    </div> --}}


                </x-layouts.content>

            </div>

            @include('components.plantillas.footer')

        </div>

        <!-- ========================================================== -->
        <!-- End Page content -->
        <!-- ========================================================== -->

    </div>

</x-layouts.app>
