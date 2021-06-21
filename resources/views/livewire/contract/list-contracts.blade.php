<div>
    <div class="flex justify-between mt-4">
        <div class="w-5/12">
            <input type="text" class="input-form w-full"
                   placeholder="Escribe para buscar" wire:model="search">
        </div>
        <div class="flex items-center text-gray-700">
            <span>Mostrar:</span>
            <select class="input-form mx-2" wire:model="cant">
                <option value="3">3</option>
                <option value="5">5</option>
                <option value="10" selected>10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            <span>Contratos</span>
        </div>
    </div>

    <div class="mt-4">
        @if($contracts->count())
            <x-tables.table>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" wire:click="sortBy('name')"
                            class="cursor-pointer pl-6 pr-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="flex items-center justify-between ">
                                <span>
                                    Contrato
                                </span>
                                <span class="mt-1 text-gray-400">
                                    @if($sort === 'name')
                                        @if($direction === 'asc')
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"/>
                                        </svg>
                                        @else
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 4h13M3 8h9m-9 4h9m5-4v12m0 0l-4-4m4 4l4-4"/>
                                        </svg>
                                        @endif
                                    @endif
                                </span>
                            </div>
                        </th>
                        <th scope="col" wire:click="sortBy('price')"
                            class="cursor-pointer px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="flex items-center justify-between">
                                <span>
                                Cotización
                                </span>
                                <span class="mt-1 text-gray-400">
                                @if($sort === 'price')
                                        @if($direction === 'asc')
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"/>
                                    </svg>
                                        @else
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 4h13M3 8h9m-9 4h9m5-4v12m0 0l-4-4m4 4l4-4"/>
                                    </svg>
                                        @endif
                                    @endif
                                </span>
                            </div>
                        </th>
                        <th scope="col" wire:click="sortBy('line')"
                            class="cursor-pointer px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="flex items-center justify-between ">
                                <span class="flex items-center">
                                    <span class="hidden lg:block ">Tipo de&nbsp;</span>
                                    <span>Giro</span>
                                </span>
                                <span class="mt-1 text-gray-400">
                                    @if($sort === 'line')
                                        @if($direction === 'asc')
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"/>
                                        </svg>
                                        @else
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 4h13M3 8h9m-9 4h9m5-4v12m0 0l-4-4m4 4l4-4"/>
                                        </svg>
                                        @endif
                                    @endif
                                </span>
                            </div>
                        </th>
                        <th scope="col" wire:click="sortBy('created_at')"
                            class="cursor-pointer hidden lg:block px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="flex items-center justify-between ">
                                <span>
                                    Fecha de Creación
                                </span>
                                <span class="mt-1 text-gray-400">
                                    @if($sort === 'created_at')
                                        @if($direction === 'asc')
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"/>
                                            </svg>
                                        @else
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 4h13M3 8h9m-9 4h9m5-4v12m0 0l-4-4m4 4l4-4"/>
                                            </svg>
                                        @endif
                                    @endif
                                </span>
                            </div>
                        </th>
                        <th scope="col" wire:click="sortBy('status')"
                            class="cursor-pointer px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="flex items-center justify-between ">
                                <span>
                                    Estado
                                </span>
                                <span class="mt-1 text-gray-400">
                                    @if($sort === 'status')
                                        @if($direction === 'asc')
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"/>
                                            </svg>
                                        @else
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 4h13M3 8h9m-9 4h9m5-4v12m0 0l-4-4m4 4l4-4"/>
                                            </svg>
                                        @endif
                                    @endif
                                </span>
                            </div>
                        </th>
                        <th scope="col" class="pl-4 pr-6 py-3">
                            &nbsp;
                        </th>
                    </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($contracts as $contract)
                        <tr>
                            <td class="pl-6 pr-4 py-2 whitespace-nowrap">
                                <div class="text-sm text-gray-600 font-medium tracking-wide">
                                    @if(strlen($contract->name) >= 40)
                                        {{substr($contract->name, 0, 25)}}...{{substr($contract->name, -15)}}
                                    @else
                                        {{ $contract->name }}
                                    @endif
                                </div>
                                <div class="text-xs text-gray-400">
                                    @if(strlen($contract->description) >= 50)
                                        {{substr($contract->description, 0, 50)}}...
                                    @else
                                        {{ $contract->description }}
                                    @endif
                                </div>
                            </td>
                            <td class="px-4 py-2 text-right whitespace-nowrap text-sm text-gray-500">
                                S/. {{ $contract->price  }}
                            </td>
                            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500">
                                <div class="block lg:hidden">
                                    {{ $contract->abrev  }}
                                </div>
                                <div class="hidden lg:block">
                                    {{ $contract->line  }}
                                </div>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 hidden lg:block">
                                {{ $contract->created_at  }}
                            </td>
                            <td class="px-4 py-2 whitespace-nowrap">
                                <span
                                    class="px-4 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{$contract->color}}-200 text-{{$contract->color}}-900">
                                    {{ $contract->status  }}
                                </span>
                            </td>
                            <td class="pl-4 pr-6 py-2 whitespace-nowrap text-right text-sm font-normal">
                                <a href="{{route('contratos.mostrar', $contract->id)}}"
                                   class="text-gray-400 hover:text-indigo-600 flex items-center">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                              d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z"/>
                                    </svg>
                                    <span class="ml-1">
                                        Detalles
                                    </span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </x-tables.table>
        @else
            <div
                class="py-6 px-4 text-red-500 font-medium flex items-center bg-white rounded-md flex items-center justify-center ring-red-200 ring-2">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span class="ml-2">
                    No hay ningun dato que coincida con el criterio de la busqueda: <span
                        class="font-bold text-red-600 italic">"{{$search}}"</span>
                </span>
            </div>
        @endif

        @if( $contracts->hasPages() )
            <div class="px-6 py-3">
                {{ $contracts->links() }}
            </div>
        @endif


    </div>
</div>
