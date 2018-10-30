@extends('layouts.app')

@section('content')
    <div class="container">
        @if($groups->count() > 0)
            <div class="card">
                <ul class="list-group list-group-flush">
                    @foreach ($groups as $group)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $group->name }}
                            <span class="float-right">
                                <div class="btn-group">
                                    <a class="btn btn-sm btn-outline-primary" href="{{ route('groups.show', [$group->region->country, $group->region, $group]) }}">
                                        View
                                    </a>
                                    <a class="btn btn-sm btn-outline-primary" href="{{ route('posts.create', $group) }}">
                                        New Post
                                    </a>
                                    <a class="btn btn-sm btn-outline-primary" href="{{ route('memberships.edit', $group) }}">
                                        Settings
                                    </a>
                                    <a href="{{ route('memberships.destroy', $group) }}"
                                       onclick="event.preventDefault(); document.getElementById('delete-form-{{ $group->id }}').submit();" class="btn btn-sm btn-outline-danger" role="button">Leave group</a>
                                    <form id="delete-form-{{ $group->id }}" action="{{ route('memberships.destroy', $group) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    @can('update', $group)
                                        <a class="btn btn-sm btn-outline-primary" href="{{ route('groups.edit', $group) }}">
                                            Admin
                                        </a>
                                    @endcan
                                </div>
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        @else
            <div class="col-md-12">
                <p class="text-center text-secondary">No groups found</p>
            </div>
        @endif
    </div>
@endsection
