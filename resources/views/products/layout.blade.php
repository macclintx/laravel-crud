<!DOCTYPE html>
<html>
    <head>
        <title>Laravel CRUD Application</title>
       <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css">-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>

        <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
            <div class="container">
                <a class="navbar-brand mr-auto" href="#">Laravel CRUD</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link pull-right" href="{{ route('signOut') }}">Logout</a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <br>
            @yield('content')
        </div>
    </body>
</html>