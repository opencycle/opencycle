@extends('layouts.app')

@section('title', "Countries")
@section('description', "A list of countries with active groups")

@section('content')
    <div class="container">
        <div class="row">
            @foreach($countries->split(3) as $chunk)
                <div class="col-sm">
                    <ul class="list-group">
                        @foreach($chunk as $country)
                            <a class="list-group-item list-group-item-action" href="{{ route('countries.show', $country) }}">
                                <img class="flag-img" src="{{ route('countries.flag.file', $country->code) }}">
                                {{ $country->name }}
                            </a>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
@endsection
