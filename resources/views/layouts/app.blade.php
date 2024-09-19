<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('head')
</head>
<body class="layout-fixed sidebar-expand-lg">
    <div class="app-wrapper">
        @include('layouts.header')

        @include('layouts.sidebar')

        {{ $slot }}

        @include('layouts.footer')
    </div>

    @stack('scripts')
</body>
</html>