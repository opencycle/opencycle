@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('home') }}">View other countries</a>
        <ul>
            @foreach ($regions as $region)
                <li><a href="{{ route('regions.show', [$country, $region]) }}">{{ $region->name }}</a></li>
            @endforeach
        </ul>
    </div>
@endsection
