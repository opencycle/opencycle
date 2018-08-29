@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($regions as $region)
            <a href="{{ route('countries.regions.show', [$country, $region]) }}">{{ $region->name }}</a>
        @endforeach
    </div>

    {{ $regions->links() }}
@endsection
