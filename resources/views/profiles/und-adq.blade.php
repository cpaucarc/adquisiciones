@extends('layout.layout')

@section('title', 'Unidad de Adquisiciones')

@section('content')
    {{-- Office_ID: 2 (Unidad de Adquisiciones) --}}
    <h1 class="text-2xl font-bold tracking-wider text-gray-900">
        Unidad de Adquisiciones
    </h1>

    <div class="my-4">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A atque debitis facilis, temporibus ullam ut vel!
            Autem consequatur, consequuntur cumque debitis dolorum earum, facilis impedit incidunt ipsa iusto, nam
            reprehenderit!
        </p>
    </div>

    @livewire('profiles.und-adq')

@endsection
