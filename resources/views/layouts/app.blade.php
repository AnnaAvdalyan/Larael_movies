<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- Styles -->
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
</head>
<body>
<div id="app">

    <header id='section-header'>
        <div class="canteiner">
            <div class="header">
                <nav>
                    <div class="logo"><a class="navbar-brand header-logo" href="{{ url('/') }}">
                            <img src="{{ URL::asset('assets/images/logo.png') }}"
                                 alt="">KALLYAS</a>
                    </div>
                </nav>
                <navbar></navbar>
                <div class='header-search'>
                    <input type="text" placeholder="Search..."/>
                    {{--                <a href="#" class='login'>--}}
                    {{--                    login--}}
                    {{--                </a>--}}
                    {{--                <a href="/registration" class='singup'>Sing Up</a>--}}
                    @guest
                        <a class="nav-link login" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="nav-link login" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle login" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->fname }}
                            </a>

                            <a class="dropdown-item login" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                </div>
                {{--                </li>--}}
                @endguest
            </div>
            {{--        </div>--}}
        </div>
    </header>

    @yield('main-content')


    <footer>
        <div class="canteiner">
            <h1>footer</h1>
            <!-- <div class="info">
                <div class="logo"><a href="#"><img src="assets/images/logo-dark.png" alt="">KALLYAS</a></div>
                <p>© Copyright 2019 KALLYAS - Hogash
                Studio. All rights reserved.</p>
                <div class="partners">
                <p>Our Partners</p>

                </div>
            </div>
            <div class="movies"></div>
            <div class="others"></div>-->
        </div>
    </footer>
    <example-component></example-component>
</div>
<example-component></example-component>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script src="../assets/js/script.js"></script>

<script src="../../js/app.js"></script>
</body>

</html>
