@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Countries</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $country->name }}</li>
            </ol>
        </nav>
        <ul class="list-group">
            @foreach ($regions as $region)
                <a class="list-group-item list-group-item-action" href="{{ route('regions.show', [$country, $region]) }}">{{ $region->name }}</a>
            @endforeach
        </ul>
    </div>
@endsection
