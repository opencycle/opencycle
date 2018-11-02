@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="card">
                    <div class="card-header">{{ __('Installation') }}</div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="{{ route('install.requirements') }}" class="btn btn-primary float-right">Get Started</a>
            </div>
        </div>
    </div>
@endsection
