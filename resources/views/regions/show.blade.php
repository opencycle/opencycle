@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($groups as $group)
            <a href="{{ route('groups.show', $group) }}">{{ $group->name }}</a>
        @endforeach
    </div>

    {{ $groups->links() }}
@endsection
