<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <nav class="container navbar navbar-expand-lg navbar-dark fixed-top bg-dark">

            <!-- Brand -->
            <a class="navbar-brand" href="#">HaikuGen</a>

            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Українська</a>
                    </li>
                    <li class="nav-item disabled">
                        <a class="nav-link" href="#">Русский</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="help.html">Довідка</a>
                    </li>
                </ul>
            </div>

        </nav> 

        <main class="container" role="main">
            @yield('content')
        </main>

        <footer>
            <div class="container">
                <div class="footer-col"><span>HaikuGen 0.7.0 © Levytskyi Viktor</span></div>
                <div class="footer-col">
                    <div class="social-bar-wrap">
                        <a title="Facebook" href="" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a title="Twitter" href="" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a title="Pinterest" href="" target="_blank"><i class="fa fa-pinterest"></i></a>
                        <a title="Instagram" href="" target="_blank"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>
                <div class="footer-col">
                    <a href="mailto:admin@yoursite.ru">Написать письмо</a>
                </div>
            </div>
        </footer>



   
</body>
</html>
