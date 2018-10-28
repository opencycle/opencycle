@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">

            <ul class="list-group list-group-flush">
                @foreach ($groups as $group)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $group->name }}
                        <span class="float-right">
                        <a class="btn btn-sm btn-outline-primary" href="{{ route('groups.show', [$group->region->country, $group->region, $group]) }}">
                            View
                        </a>
                        @can('create', \Opencycle\Post::class)
                            <a class="btn btn-sm btn-outline-primary" href="{{ route('posts.create', $group) }}">
                                New Post
                            </a>
                        @endcan
                        <a class="btn btn-sm btn-outline-primary" href="{{ route('posts.create', $group) }}">
                            My Settings
                        </a>
                        @can('update', $group)
                            <a class="btn btn-sm btn-outline-primary" href="{{ route('groups.edit', $group) }}">
                                Admin
                            </a>
                        @endcan
                    </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
