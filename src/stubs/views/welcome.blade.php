@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center">
	<div>
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
        
	    <div class="text-center font-thin tracking-wide text-5xl mb-2 text-purple">Laravel</div>
	    <div class="text-center text-grey-dark">with Vue, Tailwind and PurgeCSS</div>
	</div>
</div>
@endsection