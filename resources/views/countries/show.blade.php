@extends('layouts.app')

@section('title', "Regions of $country->name")
@section('description', "A list of regions with active groups in $country->name")

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('countries.index') }}">Countries</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $country->name }}</li>
            </ol>
        </nav>

        <div class="row">
            @foreach($regions->split(3) as $chunk)
                <div class="col-sm">
                    <ul class="list-group">
                        @foreach ($chunk as $region)
                            <a class="list-group-item list-group-item-action" href="{{ route('regions.show', [$country, $region]) }}">{{ $region->name }}</a>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
@endsection
