@extends('layouts.app')

@section('content')
<div class="container mx-auto h-full flex justify-center">
    <div class="w-full md:w-1/2 m-4">
        <div class="px-6 py-4 lg:p-8 bg-white mb-6 border rounded-lg">
                
            <h1 class="mb-4 w-full text-center font-semibold text-gray-600 text-3xl">
                Verify Email
            </h1>

            <div class="mb-4 w-full">
                @if (session('resent'))
                    <div class="flex-1 text-sm border rounded text-green-700 border-green-600 bg-green-100 p-2 text-center" role="alert">
                        A new verification link has been sent to your email address.
                    </div>
                @else
                    <div class="flex-1 text-sm text-gray-600 leading-normal mb-6 text-center">
                        Please check your email to complete the registration.
                    </div>
                @endif
            </div>

            <div class="mb-4 flex">
                <a class="flex-1 bg-blue-500 hover:bg-blue-700 text-gray-100 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" href="{{ route('verification.resend') }}">
                    Resend verification email
                </a>
            </div>

        </div>
    </div>
</div>
@endsection


