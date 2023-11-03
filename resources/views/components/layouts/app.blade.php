<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Taller Mecánico</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon"/>

    <!-- Custom box css -->
    <link href="{{ asset('assets/libs/custombox/custombox.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/flatpickr/flatpickr.dark.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet"
    type="text/css" />

    @stack('styles')

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.css') }}">

</head>

<body class="antialiased">

    {{ $slot }}

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

    <!-- Modal-Effect -->
    <script src="{{ asset('assets/libs/custombox/custombox.min.js') }}"></script>

    @stack('js')

    <script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    @if(session('guardado'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '¡Guardado!',
                text: '{{ session('guardado') }}',
                timer: 5000
            });
        </script>
    @endif

    @if(session('actualizado'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '¡Actualizado!',
                text: '{{ session('actualizado') }}',
                timer: 5000
            });
        </script>
    @endif

    @if(session('eliminado'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '¡Eliminado!',
                text: '{{ session('eliminado') }}',
                timer: 5000
            });
        </script>
    @endif

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

</body>

</html>
