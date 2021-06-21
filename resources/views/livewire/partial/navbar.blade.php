<nav x-data="{openDropdown: false, openModal: false}" class="bg-gray-100 border-b-2 border-gray-200">
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
                        <div
                            class="h-10 w-10 rounded-full bg-pink-600 hover:bg-pink-700 rounded-full flex items-center text-center align-middle focus:outline-none cursor-pointer text-white"
                            x-on:click="{openDropdown = !openDropdown}">
                            <span
                                class="text-xl text-center w-full">
                                {{ $firstLetter }}
                            </span>
                        </div>

                        <div x-show="openDropdown" x-on:click.away="{openDropdown = false}"
                             class="divide-y divide-gray-100 origin-top-right absolute right-0 mt-2 w-72 rounded-md shadow-lg py-1 bg-white ring ring-black ring-opacity-5 focus:outline-none"
                             role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                             tabindex="-1">

                            <div class="py-1" role="none">
                                <span class="block px-4 py-2 text-sm text-gray-700 tracking-wide font-bold"
                                      role="menuitem" tabindex="-1" id="user-menu-item-0">
                                    {{ $userLogged }}
                                </span>
                                <span class="block pl-4 pr-0 py-0 mb-2 text-xs text-gray-400"
                                      role="menuitem" tabindex="-1" id="user-menu-item-0">
                                    {{ $officeLogged }}
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

                                <span x-on:click="{openModal = true, openDropdown = false}"
                                      class="cursor-pointer block px-4 py-2 text-sm text-red-500 hover:bg-red-50"
                                      role="menuitem" tabindex="-1" id="user-menu-item-2">
                                    <div class="flex items-center">
                                        <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                        </svg>
                                        Cerrar Sesión
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    Modal for log out--}}
    <div x-show="openModal" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
         aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 backdrop-filter backdrop-blur-sm bg-gray-600 bg-opacity-50 transition-opacity"
                 aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <!-- Heroicon name: outline/exclamation -->
                            <svg class="h-6 w-6 text-red-600" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-700" id="modal-title">
                                ¿Preparado para partir?
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Seleccione <span class="font-bold text-gray-600">Cerrar sesión</span> a continuación
                                    si está listo para finalizar su sesión actual.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Cerrar Sesión
                        </button>
                    </form>
                    <button type="button" x-on:click="{openModal = false}"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>
