@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($groups as $group)
            <a href="{{ route('countries.regions.groups.show', [$country, $region, $group]) }}">{{ $group->name }}</a>
        @endforeach
    </div>

    {{ $groups->links() }}
@endsection
