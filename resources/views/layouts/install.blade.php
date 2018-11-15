@extends('layouts.html')

@section('app')
    @include('layouts.partials.alerts')

    <main class="py-4">
        @yield('content')
    </main>
@endsection
