<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        #menu-toggle:checked+#menu {
            display: block;
        }
    </style>
</head>

<body class="h-screen dark:bg-gray-900">
    <div id="app" class="text-gray-700 dark:text-gray-200">
        @include('layouts.navbar')
        @if (Session::has('alert'))
            <x-alert type="{{Session::get('alert')[0]}}" title="{{Session::get('alert')[1]}}" message="{{Session::get('alert')[2]}}" />
        @elseif ($errors->any())
            <x-alert type="error" title="Validation ERROR" message="{{ implode(',', $errors->all()) }}" />
        @endif
        @yield('content')
    </div>
    <script>
        if (document.getElementById('alert')) {
            setTimeout(function() {
                document.getElementById('alert').hidden = true;
            }, 5000);
        }
    </script>
</body>

</html>