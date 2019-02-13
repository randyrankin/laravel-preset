<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <script>
            window.Laravel = {
                appName: '{{ config('app.name') }}'
            }
        </script>
    </head>
    <body class="antialiased bg-grey-lightest font-sans leading-tight text-black">
        <div id="app" v-cloak>

            <nav class="bg-white h-12 shadow mb-8 px-6 md:px-0">
                <div class="container mx-auto h-full">
                    <div class="flex items-center justify-center h-12">
                        <div class="mr-6">
                            <a href="{{ url('/') }}" class="text-lg font-hairline text-teal-darker no-underline hover:underline">
                                {{ config('app.name', 'Laravel') }}
                            </a>
                        </div>
                        <div class="flex-1 text-right">
                            @guest
                                <a class="no-underline hover:underline text-teal-darker pr-3 text-sm" href="{{ url('/login') }}">{{ __('Login') }}</a>
                                <a class="no-underline hover:underline text-teal-darker text-sm" href="{{ url('/register') }}">{{ __('Register') }}</a>
                            @else
                                <span class="text-teal-darker text-sm pr-4">{{ Auth::user()->name }}</span>

                                <a href="{{ route('logout') }}"
                                    class="no-underline hover:underline text-teal-darker text-sm"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    {{ csrf_field() }}
                                </form>
                            @endguest
                        </div>
                    </div>
                </div>
            </nav>

            
            @yield('content')
        </div>
        @stack('beforeScripts')
        <script src="{{ mix('js/manifest.js') }}"></script>
        <script src="{{ mix('js/vendor.js') }}"></script>
        <script src="{{ mix('js/app.js') }}"></script>
        @stack('afterScripts')
    </body>
</html>