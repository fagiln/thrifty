<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Thrifty</title>
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.css') }}">
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

                <a class="btn btn-custom" href="{{route('login.index')}}">
                    Login
                </a> 
                <a class="btn">
                   Sign
                </a>
            </div>
        </div>
    </nav>
</body>

</html>
