<!DOCTYPE html>
<html>
<head>
    <title>Testing HTML</title>
    <link rel="stylesheet" href="css/main.css" />
    <link href="css/fontawesome-all.min.css" rel="stylesheet" />
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
</head>
<body class="bg-red">
    <div class="wrapper-wide container" >
        <span class="menu-header"><i class="fa fa-user"></i> <i class="fa fa-chevron-down"></i></span>
        <div class="menu-container">
            <ul>
                <li>Sign up</li>
                <li>Sign in</li>
            </ul>
        </div>
        <div id="app">
            <form action="{{ route('posttest') }}" method="post">
                {{ csrf_field() }}
                <feature>
                </feature>
                <button type="submit">Send</button>
            </form>
        </div>
    </div>

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            'apiToken' => auth()->user()->api_token ?? null,
        ]) !!};
    </script>
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
