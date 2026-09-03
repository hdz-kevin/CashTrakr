@extends('layouts.auth')

@section('title')
    Dashboard
@endsection

@section('auth-contents')
    @if (session('success'))
        <x-alert type="success" :message="session('success')" />
    @endif
@endsection
