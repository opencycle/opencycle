<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Opencycle') }} - @yield('title')</title>

    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="https://transloadit.edgly.net/releases/uppy/v0.27.3/dist/uppy.min.css" rel="stylesheet">

    <link rel="icon" type="image/png" href="/favicon.png" />
</head>
<body>
<div id="app">
    @yield('app')
</div>

@stack('scripts')
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
