<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Thrifty</title>
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/adminlte/plugins/fontawesome-free/css/all.min.css') }}">

</head>

<body>
    <nav class="navbar ">
        <div class="container-fluid d-flex">
            <div>
                <a class="navbar-brand" href="#">
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
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/logout"> <i class="fas fa-sign-out-alt"></i>
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
    @stack('scripts')
    <script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
</body>

</html>
