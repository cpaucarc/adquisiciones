<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @livewireStyles
</head>
<body>
<div>
    @livewire('navbar')
</div>
<h1>Titulo del documento</h1>
<p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium beatae consectetur fugit incidunt quam,
    quibusdam reiciendis sunt voluptates voluptatum! Consectetur ducimus eius fuga iste nesciunt possimus sit tempora
    ut!
</p>


<div>
    @livewire('footer')
</div>


</body>
@livewireScripts
</html>
