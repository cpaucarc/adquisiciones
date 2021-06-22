<div class="my-4">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($logs as $log)
            <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-300">
                <div class="flex items-center justify-between">
                    <h1 class="font-semibold text-gray-800 truncate mr-2">
                        {{ $log->id  }}
                    </h1>
                    <span
                        class="bg-red-200 text-center text-red-800 text-xs px-2 py-1 rounded-lg w-28 truncate">
                            No es urgente
                        </span>
                </div>
                <div class="text-gray-400 text-xs">
                    Enviado el {{ date('d M Y h:ia', strtotime($log->created_at))  }}
                </div>
                <div class="text-gray-400 text-xs my-3">
                    Enviado el {{ date('d-M-Y h:ia', strtotime($log->created_at))  }}
                    {{ $log->status }}
                </div>
                <div class="flex items-center justify-between mt-3">
                    <div class="text-gray-600 text-sm">
                        Cotización:
                        <span class="font-semibold">
                                S/. {{ $log->contract_id  }}
                            </span>
                    </div>
                    <button
                        class="flex items-center py-1 px-3 font-semibold text-gray-400 hover:text-indigo-700 focus:outline-none bg-transparent hover:bg-indigo-100 rounded-md">
                        Revisar
                        <svg class="ml-1 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75"
                                  d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                    </button>
                </div>
            </div>
        @endforeach

    </div>
    @dd($logs)

</div>
