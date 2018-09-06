@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('My Profile') }}</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Username: {{ $user->username }}</li>
                        <li class="list-group-item">Email: {{ $user->email }}</li>
                        <li class="list-group-item">Posts: <a href="{{ route('posts.user') }}">{{ $user->posts->count() }}</a></li>
                        <li class="list-group-item">Groups: <a href="{{ route('groups.user') }}">{{ $user->groups->count() }}</a></li>
                        <li class="list-group-item">
                            <div class="btn-group">
                                <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-outline-primary" role="button">Update your details</a>
                                <a href="{{ route('users.destroy', $user) }}"
                                   onclick="event.preventDefault(); document.getElementById('delete-form').submit();" class="btn btn-sm btn-outline-danger" role="button">Delete account</a>
                                <form id="delete-form" action="{{ route('users.destroy', $user) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
