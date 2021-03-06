<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">

    @include('layouts.partials.nav')

    <div id="flashMsg" class="hide">
    </div>

    <main role="main">

        @yield('content')

    </main>

    <footer class="honey-style py-2">
        <div class="container">

            <div class="float-left"><img src="{{asset('img/honey/logo.png')}}" alt=""></div>
            <div class="float-right text-right">
                <a href="https://vk.com/feed"><img src="{{asset('img/honey/vk.jpg')}}" class="socials mt-0" alt=""></a>
                <a href="https://www.facebook.com"><img src="{{asset('img/honey/fb.jpg')}}" class="socials mt-0" alt=""></a>
            </div><br style="clear: both">
        </div>
    </footer>

</div>

@yield('scripts')
</body>
</html>
