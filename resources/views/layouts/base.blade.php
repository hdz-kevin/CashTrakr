<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }} - @yield('title')</title>

        @fonts

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>

    <body>

        <header class="bg-purple-950 text-white py-5">
            <div class="max-w-7xl mx-auto flex flex-col items-center lg:flex-row lg:justify-between">
                <div class="w-full max-w-100">
                    <img src="{{ asset('images/logo.svg') }}" alt="CashTrackr Logo" class="w-full block">
                </div>
                <nav class="flex flex-col lg:flex-row gap-4 items-center">
                    <a href="{{ route('auth.login') }}" class="font-bold uppercase {{ Route::currentRouteName() === 'auth.login' ? 'border-2 border-amber-500 px-5 py-2 text-amber-500' : '' }}">
                        Iniciar Sesión
                    </a>
                    <a href="{{ route('auth.register') }}" class="font-bold uppercase {{ Route::currentRouteName() === 'auth.register' ? 'border-2 border-amber-500 px-5 py-2 text-amber-500' : '' }}">
                        Crear Cuenta
                    </a>
                </nav>
            </div>
        </header>

        @yield('contents')
    </body>

</html>
