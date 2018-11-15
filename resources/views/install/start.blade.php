@extends('layouts.install')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="card">
                    <div class="card-header">{{ __('Installation') }}</div>
                    <div class="card-body">
                        <p>Lets get started.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6 offset-3 mt-3">
                <a href="{{ route('install.requirements') }}" class="btn btn-primary float-right">Get Started</a>
            </div>
        </div>
    </div>
@endsection
