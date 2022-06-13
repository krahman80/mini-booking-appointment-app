<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Booking App</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>

        <script src="{{ asset('js/app.js')}} "></script>
        <link rel="stylesheet" href="{{ asset('css/app.css')}}">
        <link rel="stylesheet" href="{{ asset('css/flatpickr.css')}}">

        {{-- <link rel="stylesheet" href="{{ asset('css/pikaday.css')}}"> --}}
    </head>
    <body class="bg-blue-200">
        @include('layouts.nav')
        @yield('content')
        @yield('script')
    </body>
</html>
