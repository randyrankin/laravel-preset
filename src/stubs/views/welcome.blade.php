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
        	@if(Route::has('login'))
		        <div class="absolute pin-t pin-r mt-4 mr-4">
		            @auth
		                <a href="{{ url('/home') }}" class="no-underline hover:underline text-sm font-normal text-teal-darker uppercase">{{ __('Home') }}</a>
		            @else
		                <a href="{{ route('login') }}" class="no-underline hover:underline text-sm font-normal text-teal-darker uppercase pr-6">{{ __('Login') }}</a>
		                <a href="{{ route('register') }}" class="no-underline hover:underline text-sm font-normal text-teal-darker uppercase">{{ __('Register') }}</a>
		            @endauth
		        </div>
		    @endif

			<div>
			    <div class="text-center font-thin tracking-wide text-5xl mb-2 text-purple">Laravel</div>
			    <div class="text-center text-grey-dark">with Vue, Tailwind and PurgeCSS</div>
			</div>
        </div>
        @stack('beforeScripts')
        <script src="{{ mix('js/manifest.js') }}"></script>
        <script src="{{ mix('js/vendor.js') }}"></script>
        <script src="{{ mix('js/app.js') }}"></script>
        @stack('afterScripts')
    </body>
</html>
<div class="min-h-screen flex items-center justify-center">

