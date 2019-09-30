<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Opencycle') }}</title>
    <meta name="description" content="@yield('description')" />

    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="https://transloadit.edgly.net/releases/uppy/v0.27.3/dist/uppy.min.css" rel="stylesheet">

    <link rel="icon" type="image/png" href="/favicon.png" />

    <meta name="twitter:card" value="summary">
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:description" content="@yield('description')" />
    <meta property="og:site_name" content="{{ config('app.name', 'Opencycle') }}" />
</head>
<body>
<div id="app">
    @yield('app')
</div>

@stack('scripts')
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
