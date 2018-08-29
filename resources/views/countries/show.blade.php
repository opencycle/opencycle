@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($regions as $region)
            <a href="{{ route('regions.show', $region) }}">{{ $region->name }}</a>
        @endforeach
    </div>

    {{ $regions->links() }}
@endsection
