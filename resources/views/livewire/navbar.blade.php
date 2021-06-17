<nav x-data="{open: false}" class="bg-gray-100 border-b-2 border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <a class="flex items-center" href="{{ route('inicio')  }}">
                <div class="flex-shrink-0">
                    <img class="h-10" src="{{url('/images/unasam_escudo.svg')}}"
                         alt="Escudo de la Unasam">

                </div>
                <div class="ml-1">
                    <p class="font-bold text-xl text-gray-700">
                        Unasam
                    </p>
                </div>

            </a>
            <div>
                <div class="ml-4 flex items-center md:ml-6">
                    <!-- Profile dropdown -->
                    <div class="ml-3 relative mt-1">
                        <div class="cursor-pointer text-gray-700" x-on:click="{open = !open}">
                            <svg class="h-10 w-10 " viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </div>

                        <!--
                          Dropdown menu, show/hide based on menu state.

                          Entering: "transition ease-out duration-100"
                            From: "transform opacity-0 scale-95"
                            To: "transform opacity-100 scale-100"
                          Leaving: "transition ease-in duration-75"
                            From: "transform opacity-100 scale-100"
                            To: "transform opacity-0 scale-95"
                        -->
                        <div x-show="open" x-on:click.away="{open = false}"
                             class="divide-y divide-gray-100 origin-top-right absolute right-0 mt-2 w-72 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                             role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                             tabindex="-1">

                            <div class="py-1" role="none">
                                <span class="block px-4 py-2 text-sm text-gray-700 tracking-wide font-bold"
                                      role="menuitem" tabindex="-1" id="user-menu-item-0">
                                    Paucar Colonia Frank
                                </span>
                                <span class="block pl-4 pr-0 py-0 text-xs text-gray-400"
                                      role="menuitem" tabindex="-1" id="user-menu-item-0">
                                    Dirección de Abastecimiento y Servicios Auxiliares
                                </span>
                            </div>

                            <div class="py-1" role="none">
                                <a href="#"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50"
                                   role="menuitem" tabindex="-1" id="user-menu-item-0">
                                    <div class="flex items-center">
                                        <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                  d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        Mi perfil
                                    </div>
                                </a>

                                <a href="#"
                                   class="block px-4 py-2 text-sm text-red-500 hover:bg-red-50"
                                   role="menuitem"
                                   tabindex="-1" id="user-menu-item-2">
                                    <div class="flex items-center">
                                        <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                        </svg>
                                        Cerrar Sesión
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
