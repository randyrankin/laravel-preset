@extends('layouts.app')

@section('content')
<div class="container mx-auto h-full flex justify-center">
    <div class="w-full md:w-1/2 m-4" >
        <div class="px-6 py-4 lg:p-8 bg-white mb-6 border rounded-lg">
                    
            <h1 class="mb-4 w-full text-center font-semibold text-gray-600 text-3xl">
                {{ __('Login') }}
            </h1>
            
            <form class="w-full p-6" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="flex flex-wrap mb-6">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                        {{ __('E-Mail Address') }}:
                    </label>

                    <input id="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('email') ? ' border-red-500' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>

                <div class="flex flex-wrap mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                        {{ __('Password') }}:
                    </label>

                    <input id="password" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('password') ? ' border-red-500' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>

                <div class="flex mb-6">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="text-sm text-gray-700 ml-3" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <div class="flex flex-wrap items-center">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-gray-100 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-blue-500 hover:text-blue-700 whitespace-no-wrap no-underline ml-auto" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif

                    @if (Route::has('register'))
                        <p class="w-full text-xs text-center text-gray-700 mt-8 -mb-4">
                            Don't have an account?
                            <a class="text-blue-500 hover:text-blue-700 no-underline" href="{{ route('register') }}">
                                Register
                            </a>
                        </p>
                    @endif
                </div>
            </form>

        </div>
    </div>
</div>
@endsection