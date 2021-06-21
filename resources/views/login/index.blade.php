@extends('layout.layout-no-navbar')

@section('title', 'Iniciar Sesion')

@section('content')

    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-6">
            <div>
                <img class="mx-auto h-32 w-auto" src="{{ url('/images/ogcu.svg') }}"
                     alt="Workflow">
                <h2 class="text-center text-xl font-extrabold text-gray-700">
                    Inicia sesión en tu cuenta
                </h2>
            </div>
            <form class="mt-8 space-y-6" action="{{ route('log-in') }}" method="POST">
                @csrf
                <input type="hidden" name="remember" value="true">
                <div class="rounded-md shadow-sm -space-y-px">
                    <div class="col-span-6 my-2">
                        <label for="username" class="tracking-wide block text-sm font-medium text-gray-700">
                            Nombre de usuario
                        </label>
                        <input type="text" name="username" id="username" required
                               class="input-form w-full"
                               @error('oldUsername')
                               value="{{ $message }}"
                               @enderror
                               autofocus>

                        @error('username')
                        <span class="text-xs text-red-500">
                            {{ $message }}"
                        </span>
                        @enderror
                    </div>

                    <div class="col-span-6 my-2">
                        <label for="password" class="tracking-wide block text-sm font-medium text-gray-700">
                            Contraseña
                        </label>
                        <input type="password" name="password" id="password"
                               class="input-form w-full" required>
                        @error('password')
                        <span class="text-xs text-red-500">
                            {{ $message }}"
                        </span
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-between my-2">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember_me" type="checkbox"
                               class="h-5 w-5 text-indigo-600 hover:ring-indigo-500 border-gray-300 rounded">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                            Remember me
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                            Forgot your password?
                        </a>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit"
                            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                          <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <!-- Heroicon name: solid/lock-closed -->
                            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400"
                                 viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path fill-rule="evenodd"
                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                    clip-rule="evenodd"/>
                            </svg>
                          </span>
                        Iniciar Sesión
                    </button>
                </div>
            </form>

            @error('name')
            <x-alerts.danger>
                @slot('title')
                    ¡Hubo un error!
                @endslot
                {{ $message }}
            </x-alerts.danger>
            @enderror
        </div>
    </div>

@endsection
