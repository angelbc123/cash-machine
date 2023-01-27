<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    </head>
    <body class="antialiased">

        <div class="container p-5">
            @error('total_amount')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    You have exceeded amount limit of {{ number_format(config('cash-machine.amount_limit'), 2, ',', '.') }}$!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror

            @yield('content')
        </div>
    </body>
</html>
