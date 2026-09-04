@extends('layouts.auth')

@section('title')
    Confirmar email
@endsection

@section('auth-contents')
    <p class="text-center text-lg mb-3">
        Tu cuenta ha sido creada con éxito.
    </p>
    <p class="text-center text-lg">
        Revisa tu email, te hemos enviado un enlace de confirmación.
    </p>

    @if (session('success'))
        <x-alert type="success" :message="session('success')" class="mt-8" />
    @endif

    <form method="POST" action="{{ route('verification.send') }}" class="flex justify-center">
        <button type="submit" class="bg-black text-white px-4 py-2.5 rounded-md mt-8 cursor-pointer">
            Reenviar email de confirmación
        </button>
    </form>
@endsection
