<!doctype html>
<html lang="en">
<head>
    <x-heads.head>
        Contratos
    </x-heads.head>
    @livewireStyles
</head>
<body class="bg-gray-100">
<div>
    @livewire('navbar')
</div>

<div class="container mx-auto w-10/12 py-10">

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
                    <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-400">
                            Estado actual
                        </dt>
                        <dd class="mt-1 text-sm text-gray-700 sm:mt-0 sm:col-span-2">
                            <span
                                class="px-4 py-1 rounded-lg bg-{{ $contract->status->color }}-200 text-{{ $contract->status->color }}-900">
                                {{ $contract->status->name }}
                            </span>
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-400">
                            Descripción
                        </dt>
                        <dd class="mt-1 text-sm text-gray-700 sm:mt-0 sm:col-span-2">

                            <div x-data="{ open:false }">

                                <div x-show="!open">
                                    {{ substr($contract->description, 0, 165) }}...
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
                    Documentos adjuntos
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-400">
                    Personal details and application.
                </p>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    @foreach( $contract->documents as $document)

                        <div class="border-b px-4 py-5 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6 flex items-center">
                            <dt class="text-sm font-medium text-gray-500">
                                <span class="flex items-center mb-2">
                                    <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    {{ date("h:ia", strtotime($document->created_at)) }}
                                </span>
                                <span class="flex items-center mb-2">
                                    <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    {{ date("d-m-Y", strtotime($document->created_at)) }}
                                </span>
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-3">
                                <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                    <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                        <div class="w-0 flex-1 flex items-center">
                                            <!-- Heroicon name: solid/paper-clip -->
                                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400"
                                                 viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                      d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                            <span class="ml-2 flex-1 w-0 truncate">
                                                @if(strlen($document->name) > 45)
                                                    {{ substr($document->name,0, 30) }}
                                                    ...{{ substr($document->name, -10) }}
                                                @else
                                                    {{ $document->name  }}
                                                @endif
                                            </span>
                                        </div>
                                        <div class="ml-4 flex-shrink-0">
                                            <a href="{{ route('file', explode('/', $document->link)[1]) }}"
                                               target="_blank"
                                               class="font-medium text-gray-600 hover:text-indigo-600 flex items-center">
                                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                                     stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="1.5"
                                                          d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                </svg>
                                                Descargar
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </dd>
                        </div>
                    @endforeach


                </dl>
            </div>
        </div>

    </div>
</div>


</body>

@livewireScripts

</html>


