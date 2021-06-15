<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/filepond/dist/filepond.min.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css"
          rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    @livewireStyles
</head>
<body class="bg-gray-100">

<div>
    @livewire('navbar')
</div>

<div class="container mx-auto w-8/12 pt-8">
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
        {{--        @livewire('create-office');--}}
    </div>

</div>


</body>

@livewireScripts
<script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.min.js"></script>
<script
    src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.min.js"></script>
<script
    src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>

<script>
    FilePond.registerPlugin(
        FilePondPluginFileEncode,
        FilePondPluginFileValidateSize,
        FilePondPluginImageExifOrientation,
        FilePondPluginImagePreview
    );

    // Select the file input and use create() to turn it into a pond
    FilePond.create(
        document.querySelector("input[name='document']")
    );



</script>

</html>
