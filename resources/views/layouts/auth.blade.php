@extends('layouts.base')

@section('contents')
    <main class="w-full max-w-2xl mx-auto p-8 lg:p-10 mt-10 lg:mt-24 rounded-lg lg:shadow-lg">
        <h1 class="text-4xl font-bold text-center mb-10">
            @yield('title')
        </h1>

        @yield('auth-contents')
    </main>
@endsection
