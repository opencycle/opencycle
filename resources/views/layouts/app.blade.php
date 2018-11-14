@extends('layouts.html')

@section('app')
    @include('layouts.partials.nav')
    @include('layouts.partials.alerts')

    <main class="py-4">
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <span class="text-muted">Powered by <a href="https://github.com/opencycle/opencycle">Opencycle</a></span>
        </div>
    </footer>
@endsection
