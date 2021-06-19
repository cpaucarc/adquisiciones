<!doctype html>
<html lang="en">
<head>

    <x-heads.head>
        Crear nuevo contrato
    </x-heads.head>
    @livewireStyles
</head>
<body class="bg-gray-100  relative">

<div>
    @livewire('navbar')
</div>

<div class="container mx-auto w-8/12 py-8">
    {{--    <x-alerts.danger>--}}
    {{--        <x-slot name="title">--}}
    {{--            Server Error--}}
    {{--        </x-slot>--}}
    {{--        <strong>Whoops!</strong> Something went wrong!--}}
    {{--    </x-alerts.danger>--}}

    {{--    <x-alerts.success>--}}
    {{--        <x-slot name="title">--}}
    {{--            Exito--}}
    {{--        </x-slot>--}}
    {{--        <strong>Whoops!</strong> Something went wrong!--}}
    {{--    </x-alerts.success>--}}

    {{--    <x-alerts.warning>--}}
    {{--        <x-slot name="title">--}}
    {{--            Cuidado--}}
    {{--        </x-slot>--}}
    {{--        <strong>Whoops!</strong> Something went wrong!--}}
    {{--    </x-alerts.warning>--}}

    <div>
        @livewire('create-contract')
    </div>

</div>

<div>
    @livewire('footer')
</div>

</body>

@livewireScripts

</html>
