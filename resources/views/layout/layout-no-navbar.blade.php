<!doctype html>
<html lang="en">
<head>
    {{-- Default Head Properties--}}
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="alternate icon" href="{{url('favicon.ico')}}">
    <title>
        @yield('title')
    </title>

    {{-- Own libraries--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- External CSS libraries--}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
          crossorigin="anonymous"/>

    {{-- External JS libraries--}}
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>

    @livewireStyles
</head>
<body class="bg-gray-100 h-screen">

<div class="container mx-auto w-10/12">

    @yield('content')

</div>

@livewireScripts
</body>
</html>
