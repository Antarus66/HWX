<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, width=device-width">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ"
          crossorigin="anonymous">
    <style>
        .container {
            padding-top: 20px;
        }

        .help-block {
            color: darkred;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
        <div class="collapse navbar-collapse">
            <a class="navbar-brand" href="#">Bikes</a>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('car-form') }}">Add</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('car-list') }}">Cars list</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-12 main">
                @section('content')
                    <p>This is my body content.</p>
                @show
            </div>
        </div>
    </div>
</body>
</html>