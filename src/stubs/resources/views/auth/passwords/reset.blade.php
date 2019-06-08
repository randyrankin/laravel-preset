@extends('layouts.app')

@section('content')
<div class="container mx-auto h-full flex justify-center">
    <div class="w-full md:w-1/2 m-4" >
        <div class="px-6 py-4 lg:p-8 bg-white mb-6 border rounded-lg">
            <h1 class="mb-4 w-full text-center font-semibold text-gray-600 text-3xl">
                {{ __('Reset Password') }}
            </h1>

            <form class="w-full p-6" method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="flex flex-wrap mb-6">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                        {{ __('E-Mail Address') }}:
                    </label>

                    <input id="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('email') ? ' border-red' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

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

                    <input id="password" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('password') ? ' border-red' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $errors->first('password') }}
                        </p>
                       @endif
                </div>

                <div class="flex flex-wrap mb-6">
                    <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2">
                        {{ __('Confirm Password') }}:
                    </label>

                    <input id="password-confirm" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="password_confirmation" required>
                </div>

                <div class="flex flex-wrap">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-gray-100 font-bold  py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection