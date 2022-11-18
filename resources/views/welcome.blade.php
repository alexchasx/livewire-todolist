<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TODO List</title>

        @vite('resources/css/app.css')

        @livewireStyles

    </head>
    <body class="antialiased">
        
    @livewire('to-do-list')

    @livewireScripts

    <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>

    </body>
</html>
