<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GuestList</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-findcond">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ route('home') }}">GuestList</a>
                </div>
                <div id="navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active">
                            <a href="{{ route('sign') }}">Sign the GuestList</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>