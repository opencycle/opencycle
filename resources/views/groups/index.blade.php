@extends('layouts.app')

@section('content')
    <div class="container">
        <ul class="list-group">
            @foreach ($groups as $group)
                <a class="list-group-item list-group-item-action" href="{{ route('groups.show', [$group->region->country, $group->region, $group]) }}">
                    {{ $group->name }}
                </a>
            @endforeach
        </ul>

        {{ $groups->links() }}
    </div>
@endsection
