<!DOCTYPE html>
<html>
<head>
    <title>Solaire Generation - tous les équipments de solaire</title>
    <link rel="stylesheet" href="css/app.css" />
    <link href="css/fontawesome-all.min.css" rel="stylesheet" />
    @yield('extra-css')
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
</head>
<body>
    <div class="wrapper-wide">
        <!-- Header -->
        <div class="header">
            <header class="wrapper-wide">
                <div class="logo">
                    <a href="#">Solair <span>Generation</span></a>
                </div>
                <nav class="main-nav">
                    <a href="{{ route('landing-page') }}">Home</a>
                    <a href="{{ route('shop.index') }}">Product</a>
                    <a href="#">Contact</a>
                    <a href="#">About</a>
                    @include('partials.search')
                    <a href="{{ route('cart.index') }}">
                        <i class="fa fa-shopping-cart">
                            @if(Cart::count() > 0)
                                <span class="cart-counter">{{ Cart::instance('default')->count() }}</span>
                            @endif
                        </i>
                    </a>
                    <a href="{{ route('login') }}"><i class="fa fa-user"></i></a>
                    <i class="fa fa-bars hamburger"></i>
                    <div class="dimmer"></div>
                </nav>
            </header>
        </div>
        <!-- End Header -->
        <!-- Main Section -->
        <div class="container">
            @yield('content')
        </div>
    </div>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            'apiToken' => auth()->user()->api_token ?? null,
        ]) !!};
    </script>
    <script src="js/app.js"></script>
    @yield('extra-js')
</body>
</html>
