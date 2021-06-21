<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ trans('front_mainpage.windowtitle') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="mainpaper container">
            <header>
                <h1>HaikuGen</h1>
                <nav>
                    <a href="/">UA</a>
                    <a href="/ru">RU</a>
                </nav>
            </header>
            <main role="main">
                @yield('content')
            </main>

            <footer>

                <div class="footer-col"><span>HaikuGen 0.7.1 © Levytskyi Viktor</span></div>
                <div class="footer-col">
                    <div class="social-bar-wrap">
                        <a title="Facebook" href="" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a title="Twitter" href="" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a title="Pinterest" href="" target="_blank"><i class="fa fa-pinterest"></i></a>
                        <a title="Instagram" href="" target="_blank"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>

            </footer>
        </div>



    </body>
</html>
