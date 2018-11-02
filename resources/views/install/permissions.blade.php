@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="card">
                    <div class="card-header">{{ __('Folder Permissions') }}</div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($permissions as $folder => $writable)
                                <li class="list-group-item list-group-item-{{ $writable ? 'success' : 'danger' }}">
                                    {{ $folder }}
                                    <i class="fas fa-{{ $writable ? 'check' : 'times' }} float-right"></i>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if ($passed)
                    <a href="{{ route('install.environment.create') }}" class="btn btn-primary float-right">Next</a>
                @endif
            </div>
        </div>
    </div>
@endsection
