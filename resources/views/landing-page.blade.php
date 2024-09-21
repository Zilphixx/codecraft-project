<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    </head>
<body>
    {{-- <header class="navbar navbar-expand-lg">
        <nav class="container-fluid">
            <div class="navbar-brand flex-grow-1 ms-5">
                <x-application-logo />
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="justify-content-end me-5 collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav gap-5">
                    <a class="nav-link" aria-current="page" href="{{ route('be.a.teacher') }}">Be A Teacher</a>
                    <a class="nav-link" href="#">Login</a>
                    <a class="nav-link" href="#">Register</a>
                </div>
            </div>
        </nav>
    </header> --}}

</body>
</html>