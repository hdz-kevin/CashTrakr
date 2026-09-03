@props(['type' => 'success', 'message' => ''])

@php
    $classes = [
        'success' => 'bg-green-100 border-green-400 text-green-700',
        'error' => 'bg-red-100 border-red-400 text-red-700',
    ];
@endphp

<div class="text-center px-4 py-3 mb-10 border-l-4 text-sm font-bold uppercase {{ $classes[$type] }}">
    {{ $message }}
</div>
