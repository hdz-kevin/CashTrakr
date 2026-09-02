@extends('layouts.auth')

@section('title')
    Dashboard
@endsection

@section('auth-contents')
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded my-5">
            {{ session('success') }}
        </div>
    @endif
@endsection
