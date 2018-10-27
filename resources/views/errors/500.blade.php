@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1>{{ __('Server Error - 500') }}</h1>
                <p>Sorry we had a problem with that request, please try again.</p>
                <a class="btn btn-primary" href="{{ route('home') }}">Go home</a>
            </div>
        </div>
    </div>
@endsection
