<!DOCTYPE html>
<html>
<head>
    <title>Solaire Generation - tous les équipments de solaire</title>
    <link rel="stylesheet" href="css/app.css" />
    <link href="css/fontawesome-all.min.css" rel="stylesheet" />
    @yield('extra-css')
    <meta charset="utf-8" />
</head>
<body>
    <div class="wrapper-wide" id="app">
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
                    <a href="#"><i class="fa fa-search"></i></a>
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
        <!-- Footer -->
        <div class="footer">
            <div class="nav-footer wrapper-wide">
                <div class="column">
                    <h3>My Account</h3>
                    <ul>
                        <li><a href="#">Consectetur</a></li>
                        <li><a href="#">Adipisicing</a></li>
                        <li><a href="#">Incididunt</a></li>
                        <li><a href="#">Labore</a></li>
                        <li><a href="#">Eiusmod</a></li>
                    </ul>
                </div>
                <div class="column">
                    <h3>My Account</h3>
                    <ul>
                        <li><a href="#">Consectetur</a></li>
                        <li><a href="#">Adipisicing</a></li>
                        <li><a href="#">Incididunt</a></li>
                        <li><a href="#">Labore</a></li>
                        <li><a href="#">Eiusmod</a></li>
                    </ul>
                </div>
                <div class="column">
                    <h3>My Account</h3>
                    <ul>
                        <li><a href="#">Consectetur</a></li>
                        <li><a href="#">Adipisicing</a></li>
                        <li><a href="#">Incididunt</a></li>
                        <li><a href="#">Labore</a></li>
                        <li><a href="#">Eiusmod</a></li>
                    </ul>
                </div>
                <div class="newslater">
                    <h3>Join to our Newslater</h3>
                    Tempor incididunt ut labore et dolore magna aliqua.
                    <form>
                        <input type="email" name="email">
                        <input class="btn btn-submit" type="submit" value="Submit">
                    </form>
                    <h3>Contact info</h3>
                    <i class="fa fa-location-arrow">Tempor incididunt ut labore et dolore magna aliqua.</i>
                    <i class="fa fa-phone">+31 55 88 99 66 33 </i>
                </div>
            </div>
            <div class="footer-bottom wrapper-wide">
                <div class="paiment">
                    <i class="fa fa-paypal"></i>
                    <i class="fa fa-cc-visa"></i>
                    <i class="fa fa-cc-mastercard"></i>
                    <i class="fa fa-cc-discover"></i>
                    <i class="fa fa-cc-amex"></i>
                </div>
                <div class="contact">
                    <h3>Contact info</h3>
                    <i class="fa fa-location-arrow">Tempor incididunt ut labore et dolore magna aliqua.</i>
                    <i class="fa fa-phone">+31 55 88 99 66 33 </i>
                </div>
            </div>
            <div class="copyright"><i class="fa fa-copyright">All right reserved to Solair Generation 2018</i></div>
        </div>
        <!-- End Footer-->
    </div>
    <script src="js/app.js"></script>
    @yield('extra-js')
</body>
</html>
