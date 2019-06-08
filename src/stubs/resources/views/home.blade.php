@extends('layouts.app')

@section('content')
    <div class="text-center tracking-wide text-5xl font-semibold mb-2 text-gray-600">Dashboard</div>
    <div class="text-center text-gray-500">{{ Auth::user()->name }}</div>
    <div class="text-center text-gray-500">{{ Auth::user()->email }}</div>
@endsection