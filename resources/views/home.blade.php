@extends('layout.layout')

@section('title', 'Inicio')

@section('content')

    <h1>Este es el Home</h1>
    <p class="mt-8">
        Se debe de crear una vista principal para cada tipo de usuario (por cada oficina)
    </p>

    @if(session('status'))
        {{ session('status') }}
    @else
        No hay session
    @endif

    @if(\Illuminate\Support\Facades\Auth::check())
        Hay un usuario loggeado
    @else
        No hay usuario loggeado
    @endif

    @if(\Illuminate\Support\Facades\Auth::check())
        {{ \Illuminate\Support\Facades\Auth::user()->person->name }}
        {{ \Illuminate\Support\Facades\Auth::user()->person->lastname }}
    @endif

    <h5>
        Oficina:
        @if(\Illuminate\Support\Facades\Auth::check())
            {{ \Illuminate\Support\Facades\Auth::user()->office_id }}
        @endif
    </h5>
@endsection
