<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <script src="./js/tailwind.js"></script>
    </head>
    <body class="antialiased">
        <div id="app">
            <router-view :key="$route.fullPath"></router-view>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>