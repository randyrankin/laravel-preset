<!doctype html>
<html class="overflow-y-scroll h-full" lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="{{ config('app.name') }}">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @stack('Styles')
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <script>
            window.Laravel = {
                appName: '{{ config('app.name') }}'
            }
        </script>
    </head>
    <body class="relative font-sans antialiased bg-gray-100">
        <div id="app" v-cloak>
            <div class="h-screen flex flex-col">
                @include ('partials.nav')
                <div class="flex-grow h-full my-8">
                    @yield('content')
                </div>
                @include ('partials.footer')
            </div>
        </div>
        @stack('beforeScripts')
        <script src="{{ mix('js/manifest.js') }}"></script>
        <script src="{{ mix('js/vendor.js') }}"></script>
        <script src="{{ mix('js/app.js') }}"></script>
        @stack('afterScripts')
    </body>
</html>