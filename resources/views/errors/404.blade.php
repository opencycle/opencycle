@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1>{{ __('Page Not Found - 404') }}</h1>
                <p>Sorry we can't find this page.</p>
                <a class="btn btn-primary" href="{{ route('home') }}">Go home</a>
            </div>
        </div>
    </div>
@endsection
