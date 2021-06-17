<!doctype html>
<html lang="en">
<head>
    <x-heads.head>
        Contratos
    </x-heads.head>

    @livewireStyles
</head>
<body class="bg-gray-100 h-screen">
<div>
    @livewire('navbar')
</div>

<div class="container mx-auto w-10/12 pt-10">
    <div>
        <a href="{{route('contratos.crear')}}" class="btn-primary">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            <span class="ml-2">
                Crear nuevo contrato
            </span>
        </a>
    </div>

    <div class="mt-8">
        @livewire('contract.list-contracts')
    </div>

</div>


<div>
    @livewire('footer')
</div>


</body>

@livewireScripts

</html>
