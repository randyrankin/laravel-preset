@extends('layouts.app')

@section('content')

    <div class="mx-auto flex items-center justify-center">
        <div class="w-full md:w-3/4 m-4" >
            <div class="px-6 py-4 lg:p-8 mb-6">
                <div class="text-center tracking-wide text-4xl mb-2 text-gray-600">{{ config('app.name', 'Laravel') }}</div>
                <div class="text-center text-gray-500">with Vue, Tailwind and PurgeCSS</div>
            </div>
        </div>
    </div>

@endsection