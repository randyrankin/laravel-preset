@extends('layouts.app')

@section('content')
<div class="container mx-auto h-full flex justify-center">
    <div class="w-full md:w-1/2 m-4" >
        <div class="px-6 py-4 lg:p-8 bg-white mb-6 border rounded-lg">
            <h1 class="mb-4 w-full text-center font-semibold text-gray-600 text-3xl">
                {{ __('Reset Password') }}
            </h1>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="flex flex-wrap mb-6">
                    @if (session('status'))
                        <div class="text-sm border rounded text-green-700 border-green-600 bg-green-100 p-2 text-center" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                <div class="flex flex-wrap mb-6">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                        {{ __('E-Mail Address') }}:
                    </label>

                    <input id="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('email') ? ' border-red' : '' }}" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>

                <div class="flex flex-wrap">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-gray-100 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        {{ __('Send Password Reset Link') }}
                    </button>
                    <p class="w-full text-xs text-center text-grey-dark mt-8 -mb-4">
                        <a class="text-blue-500 hover:text-blue-700 no-underline" href="{{ route('login') }}">
                            Back to login
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection