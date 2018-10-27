@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1>@yield('code')</h1>
                <h2>@yield('title')</h2>
                <p>@yield('message')</p>
                <a class="btn btn-primary" href="{{ route('home') }}">{{ __('Go home') }}</a>
            </div>
        </div>
    </div>
@endsection
