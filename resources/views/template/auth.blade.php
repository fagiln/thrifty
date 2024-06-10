<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <title>Thrifty | @yield('title')</title>
</head>

<body>

    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="py-4 px-5  card card-primary  " style="width: 500px">

            @if (session('register'))
                <div class="mt-3">
                    <div class="alert alert-success d-flex justify-content-between fade show" role="alert">
                        {{ session('register') }}
                        <button class="notif btn btn-close btn-sm" data-bs-dismiss="alert" type="button" aria-label="Close"></button>

                    </div>
                </div>
            @endif

            @yield('content')
        </div>
    </div>
   
    @stack('scripts')
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
</body>

</html>
