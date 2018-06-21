<!DOCTYPE html>
<html>
<head>
    <title>Testing HTML</title>
    <link rel="stylesheet" href="css/app.css" />
    <link href="css/fontawesome-all.min.css" rel="stylesheet" />
    <meta charset="utf-8" />
</head>
<body>
    <div class="wrapper-wide container" >
        <span class="menu-header"><i class="fa fa-user"></i> <i class="fa fa-chevron-down"></i></span>
        <div class="menu-container">
            <ul>
                <li>Sign up</li>
                <li>Sign in</li>
            </ul>
        </div>
        <div id="app">
            <carousel>
                <carousel-slide>
                    <img style="text-align: center" src="images/1.jpg">
                </carousel-slide>
                <carousel-slide>
                    <img style="text-align: center" src="images/2.jpg">
                </carousel-slide>
                <carousel-slide>
                    <img style="text-align: center" src="images/3.jpg">
                </carousel-slide>
                <carousel-slide>
                    <img style="text-align: center" src="images/4.jpg">
                </carousel-slide>
                <carousel-slide>
                    <img style="text-align: center" src="images/5.jpg">
                </carousel-slide>
            </carousel>
        </div>
    </div>
    <script src="js/app.js"></script>
<script>
    var menuHeader = document.querySelector('.menu-header');
    var menuContainer = document.querySelector('.menu-container');

    menuHeader.addEventListener('click', function (e) {
        e.stopPropagation();
        e.preventDefault();
        menuContainer.classList.toggle('active');
    });
    var body = document.querySelector('body');
    body.addEventListener('click', function () {
        menuContainer.classList.remove('active');
    });
</script>
</body>
</html>
