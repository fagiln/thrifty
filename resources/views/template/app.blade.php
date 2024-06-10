<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thrifty | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    {{-- <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.css') }}"> --}}
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('datatables/datatables.bundle.css') }}">
    @stack('style')
</head>

<body class="">
    <nav class="navbar p-3">
        <div class="container-fluid d-flex">
            <div>
                <a class="navbar-brand" href="/home">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" width="30" height="24"
                        class="d-inline-block align-text-top">
                    THRIFTY
                </a>
            </div>
            <div>
                @auth
                    <div class="dropdown">

                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome, {{ Auth::user()->username }}
                            <img src="{{ asset('uploads/' . Auth::user()->avatar) }}" alt=""
                                class="ml-2 rounded-circle"
                                style="width: 30px; height: 30px; object-fit: cover; margin-right: 10px;">

                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ url('profile/' . Auth::user()->id . '/edit') }}"><i
                                        class="fas fa-user-alt"></i> Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/logout"
                                    onclick="return confirm('Apa anda yakin ingin logout?')"> <i
                                        class="fas fa-sign-out-alt"></i>
                                    Logout</a></li>
                        </ul>
                    </div>

                @endauth
                @guest

                    <a class="btn btn-custom" href="{{ url('/login') }}">
                        Login
                    </a>
                    <a class="btn" href="{{ url('/register') }}">
                        Sign
                    </a>
                @endguest
            </div>
        </div>
    </nav>
    <div class="container-xxl">
        @yield('content')

    </div>
    <footer class="bg-dark text-white text-center text-lg-start mt-4">
        {{-- <div class="container-xxl p-4">
            <div class="row">
                <!-- Company Info -->
                <div class="col-lg-4 col-md-4 mb-4 mb-md-0">
                    <h5 class="text-uppercase">THRIFTY</h5>
                    <p>
                      Made by love
                    </p>
                </div>

                <!-- Useful Links -->
                <div class="col-lg-4 col-md-4 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Social Media</h5>
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#!" class="text-white">Link 1</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Link 2</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Link 3</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Link 4</a>
                        </li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-4 col-md-4 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Contact</h5>
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="mailto:info@example.com" class="text-white">info@example.com</a>
                        </li>
                        <li>
                            <a href="tel:+1234567890" class="text-white">+1 234 567 890</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div> --}}

        <div class="text-center p-3 bg-dark">
            {{-- <a class="text-white" href="https://example.com/">example.com</a> --}}
            <br>© 2024 Thrifty
        </div>
    </footer>

    @stack('scripts')
    <script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('adminlte/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('adminlte/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('adminlte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('adminlte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>

    <script src="{{ asset('adminlte/dist/js/pages/dashboard.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
    <script src="{{ asset('datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('datatables/bootstrap.datatables.js') }}"></script>
    @stack('scripts')
</body>

</html>
