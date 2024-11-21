<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> @yield('title') </title>

    <!-- Fuentes personalizadas para esta plantilla-->
    <link href="{{ asset('/sb-admin-2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    @stack('styles')

    <!-- Css del Plugin Principal-->

    <!-- Estilos personalizados para esta plantilla-->
    <link href="{{ asset('sb-admin-2/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Contenedor de la página -->
    <div id="wrapper">

        <!-- Barra lateral -->
        @include('layouts.sb-admin-2.partials.sidebar')
        <!-- Fin de la Barra lateral -->

        <!-- Contenedor de contenido -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Contenido principal -->
            <div id="content">

                <!-- Barra superior -->
                @include('layouts.sb-admin-2.partials.navbar')
                <!-- Fin de la Barra superior -->

                <!-- Comienza contenido de la página -->
                <div class="container-fluid">

                    <!-- Encabezado de la página -->
                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- Fin del contenido principal -->

            <!-- Pie de página -->
            @include('layouts.sb-admin-2.partials.footer')
            <!-- Fin del Pie de página -->

        </div>
        <!-- Fin del contenedor de contenido -->

    </div>
    <!-- Fin del contenedor de la página -->

    <!-- Botón para subir al inicio-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Modal de Logout-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Estás seguro de que deseas salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">¿El administrador <strong>{{ auth()->user()->name }}</strong> desea salir de la aplicación?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Cerrar sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript principal de Bootstrap-->
    <script src="{{ asset('/sb-admin-2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- JavaScript del plugin principal-->
    <script src="{{ asset('/sb-admin-2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <!-- Scripts personalizados para todas las páginas-->
    <script src="{{ asset('/sb-admin-2/js/sb-admin-2.min.js') }}"></script>
    <script>
        @if (session('success'))
            swal("¡Éxito!", "{{ session('success') }}", "success");
        @elseif (session('failed'))
            swal("¡Error!", "{{ session('failed') }}", "error");
        @endif

        document.addEventListener('click', function(e) {
            if (e.target.id == 'btnfr') {
                const form = document.querySelector('#myfr');
                form.addEventListener('submit', function(ev) {
                    const btn = document.querySelector('#btnfr');
                    btn.innerHTML = 'Por favor, espere...';
                    btn.style.fontWeight = 'bold';
                    btn.style.color = 'black';
                    btn.setAttribute('disabled', 'disabled');
                    return true;
                })
            }
        })

    </script>
    @stack('scripts')
</body>

</html>
