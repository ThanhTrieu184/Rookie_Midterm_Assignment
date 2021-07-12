
<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="css/app.css">
    <style>
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top">
        <a class="navbar-brand" href="#">
            <img src="bookworm_icon.svg" alt="icon" width="70%">
        </a>
        {{-- <a class="navbar-brand" href="#"><strong>BOOKWORM</strong></a> --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link @yield('home','')" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('shop','')" href="/shop">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('about','')" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('cart','')" href="/cart">Cart({{ session('cart')?count(session('cart')):0 }})</a>
                </li>
            </ul>
        </div>
    </nav>

    @yield('content')

    <div class="text-left bg-light mt-auto py-3 px-3">
        <a class="navbar-brand" href="#">
            <img src="bookworm_icon.svg" alt="icon" width="100%">
        </a>
        <p class="mb-0">Address</p>
        <p>Phone</p>
    </div>
</body>
</html>