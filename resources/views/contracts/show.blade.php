@extends('layout.layout')

@section('title', "Contrato $contract->id")

@section('content')

    <a href="{{ route('contratos') }}" class="mb-4 btn-secondary">
        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19l-7-7 7-7"/>
        </svg>
        Volver a ver la lista completa de contratos
    </a>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-x-0 gap-y-4 lg:gap-x-4">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg col-span-5">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-700">
                    Información detallada del contrato
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-400">
                    Personal details and application.
                </p>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-400">
                            Nombre
                        </dt>
                        <dd class="mt-1 text-sm text-gray-700 sm:mt-0 sm:col-span-2 tracking-wide">
                            {{ $contract->name }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-400">
                            Cotización
                        </dt>
                        <dd class="mt-1 text-sm text-gray-700 sm:mt-0 sm:col-span-2">
                            S/. {{ $contract->price }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-400">
                            Fecha de creación
                        </dt>
                        <dd class="mt-1 text-sm text-gray-700 sm:mt-0 sm:col-span-2">
                            {{ date("h:ia d-m-Y", strtotime($contract->created_at)) }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-400">
                            Tipo de Giro
                        </dt>
                        <dd class="mt-1 text-sm text-gray-700 sm:mt-0 sm:col-span-2">
                            {{ $contract->line->name }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-400">
                            Estado General
                        </dt>
                        <dd class="mt-1 text-sm text-gray-700 sm:mt-0 sm:col-span-2">
                            <span
                                class="px-4 py-1 rounded-lg tracking-wider bg-{{ $contract->status->color }}-200 text-{{ $contract->status->color }}-900">
                                {{ $contract->status->name }}
                            </span>
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-400">
                            Descripción
                        </dt>
                        <dd class="mt-1 text-sm text-gray-700 sm:mt-0 sm:col-span-2">
                            <div x-data="{ open:false }">
                                <div x-show="!open">
                                    {{ substr($contract->description, 0, 115) }}...
                                </div>
                                <div x-show="open">
                                    {{ $contract->description }}
                                </div>
                                <div class="text-right w-full font-medium">
                                    <button x-show="!open" x-on:click="{open = !open}"
                                            class="py-2 focus:outline-none text-gray-400 hover:text-gray-700 hover:underline">
                                        Mostrar más
                                    </button>
                                    <button x-show="open" x-on:click="{open = !open}"
                                            class="py-2 focus:outline-none text-gray-400 hover:text-gray-700 hover:underline">
                                        Mostrar menos
                                    </button>
                                </div>
                            </div>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
        <div class="bg-white shadow overflow-hidden sm:rounded-lg col-span-7">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-700">
                    Seguimiento del contrato
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-400">
                    Personal details and application.
                </p>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    @foreach( $contract->arrivals as $arrival)
                        <div class="border-b px-4 py-4 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6 flex items-center">
                            <dt class="text-sm text-gray-500">
                                <span class="flex items-center">
                                    <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    {{ date("h:i A", strtotime($arrival->created_at)) }}
                                </span>
                                <span class="flex items-center mt-2">
                                    <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    {{ date("d-m-Y", strtotime($arrival->created_at)) }}
                                </span>
                            </dt>
                            <dd class="text-sm text-gray-800 -ml-8 sm:col-span-3">
                                <ul class="divide-y divide-gray-200">
                                    <li class="flex items-center justify-between text-sm">
                                        <div class="w-0 flex-1 flex items-center">
                                            <div class="ml-2 py-2 flex-1 w-0 truncate">
                                                <div
                                                    class="flex items-center text-xs text-gray-400 flex items-center justify-between">
                                                    <div>
                                                        <span class="font-medium mr-1">
                                                            Origen:
                                                        </span>
                                                        {{ $arrival->originOffice->office }}
                                                    </div>
                                                    @if($arrival->status === 0)
                                                        <span
                                                            class="ml-2 rounded-lg px-2 py-1 text-xs bg-yellow-100 text-yellow-700">
                                                            {{ $arrival->arrivalStatus->name }}
                                                        </span>
                                                    @endif
                                                </div>
                                                <span class="flex items-center text-gray-600">
                                                    <div class="transform rotate-180 mr-2">
                                                        <svg class="h-4 w-4 mr-2" fill="none"
                                                             viewBox="0 0 24 24"
                                                             stroke="currentColor">
                                                          <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1"
                                                                d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/>
                                                        </svg>
                                                    </div>
                                                    <span class="font-medium mr-1">
                                                        Destino:
                                                    </span>
                                                    {{ $arrival->destinationOffice->office }}
                                                </span>
                                                <div class="text-xs ">
                                                    <p>
                                                        {{ $arrival->feedback }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        @if($arrival->document)
                                            <div class="ml-4 flex-shrink-0">
                                                <a href="{{ route('file', $arrival->document->name) }}"
                                                   target="_blank"
                                                   class="font-medium text-gray-600 hover:text-indigo-600 flex items-center">
                                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                                         stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              stroke-width="1.5"
                                                              d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
                                                    </svg>
                                                    Revisar
                                                </a>
                                            </div>
                                        @endif
                                    </li>
                                </ul>
                            </dd>
                        </div>
                    @endforeach
                </dl>
            </div>
        </div>
    </div>

@endsection
