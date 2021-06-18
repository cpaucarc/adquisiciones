<!doctype html>
<html lang="en">
<head>

    <x-heads.head>
        Inicio
    </x-heads.head>

    {{--    CSS que se usara solo en esta vista--}}

    {{--    JS que se usara solo en esta vista--}}

    @livewireStyles
</head>

<body class="bg-gray-100">

<div>
    @livewire('navbar')
</div>

<div class="container mx-auto w-10/12 pt-8">
    <h1>Este es el Home</h1>
    <p class="mt-8">
        Se debe de crear una vista principal para cada tipo de usuario (por cada oficina)
    </p>

</div>

<div>
    @livewire('footer')
</div>


</body>
@livewireScripts
</html>
