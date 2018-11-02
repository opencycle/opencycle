@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="card">
                    <div class="card-header">{{ __('PHP Version') }}</div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-{{ $phpSupported ? 'success' : 'danger' }}">
                                Version {{ $phpVersion }}
                                <i class="fas fa-{{ $phpSupported ? 'check' : 'times' }} float-right"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6 offset-3">
                <div class="card">
                    <div class="card-header">{{ __('Modules') }}</div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($requirements as $module => $enabled)
                                <li class="list-group-item list-group-item-{{ $enabled ? 'success' : 'danger' }}">
                                    {{ $module }}
                                    <i class="fas fa-{{ $enabled ? 'check' : 'times' }} float-right"></i>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if ($requirementsSupported && $phpSupported )
                    <a href="{{ route('install.permissions') }}" class="btn btn-primary float-right">Next</a>
                @endif
            </div>
        </div>
    </div>
@endsection
