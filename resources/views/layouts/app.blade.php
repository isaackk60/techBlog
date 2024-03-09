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

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="nav-footer-background-color py-6">
            <div class="sm:grid grid-cols-3 m-auto">
                <div class="text-center">
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
                <div class="sm:grid grid-cols-4 gap-3 m-auto text-center font-medium">
                    <a class="nav-footer-color" href="{{ route('blog.index') }}">{{ __('News') }}</a>
                    <a class="nav-footer-color" href="{{ route('blog.viewSearch') }}">{{ __('Search') }}</a>
                    <a class="nav-footer-color" href="{{ route('about') }}">{{ __('About') }}</a>
                    <a class="nav-footer-color" href="{{ route('contact') }}">{{ __('Contact') }}</a>
                </div>
                <div class="sm:grid grid-cols-2 gap-2 m-auto text-center font-medium">
                    @guest
                        <a class="nav-footer-color" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="nav-footer-color" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <div class="username">{{ Auth::user()->name }}</div>

                        <a href="{{ route('logout') }}" class="nav-footer-color"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </div>
            </div>


    </div>
    </header>

    @yield('content')
    </div>
    <div>
        @include('layouts.footer')
    </div>
</body>

</html>
