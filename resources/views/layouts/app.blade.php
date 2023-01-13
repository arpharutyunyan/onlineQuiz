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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="/dist/jquery.quiz-min.css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">

                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ \Illuminate\Support\Facades\App::getLocale() }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        {{--                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
                                        {{--                                            {{ \Illuminate\Support\Facades\App::getLocale() }}--}}
                                        {{--                                        </a>--}}

                                        <ul>
                                            <div> <a href="/language/en/"> En </a> </div>
                                            <div> <a href="/language/ru/"> Ru </a> </div>
                                        </ul>
                                                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                                                   onclick="event.preventDefault();
                                                                                                     document.getElementById('logout-form').submit();">
                                                                                    {{ __('Logout') }}
                                                                                </a>

                                                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                                                    @csrf
                                                                                </form>
                                    </div>
                                </li>
{{--                                                            @if (Route::has('login'))--}}
{{--                                                                <li class="nav-item">--}}
{{--                                                                    <a class="nav-link" href="/google">{{ __('Login') }}</a>--}}
{{--                                                                </li>--}}
{{--                                                            @endif--}}

{{--                                @if (Route::has('register'))--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                                    </li>--}}
{{--                                @endif--}}
                            @else
                                <li class="nav-item dropdown">
{{--                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                        {{ \Illuminate\Support\Facades\App::getLocale() }}--}}
{{--                                    </a>--}}

{{--                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">--}}
{{--                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                            {{ \Illuminate\Support\Facades\App::getLocale() }}--}}
{{--                                        </a>--}}

{{--                                        <ul>--}}
{{--                                            <li> <a href="/language/en/"> En </a> </li>--}}
{{--                                            <li> <a href="/language/ru/"> Ru </a> </li>--}}
{{--                                        </ul>--}}
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
{{--                                    </div>--}}
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>
        </div>

        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <a href="{{url('auth/google')}}" class="btn btn-primary">Login with Google</a>
            </div>
            <div class="col-md-8 col-md-offset-4">
                <a href="{{url('auth/facebook')}}" class="btn btn-primary">Login with Facebook</a>
            </div>
        </div>
        @stack('scripts')
    </body>
</html>
