@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('countries.index') }}">Countries</a></li>
                <li class="breadcrumb-item"><a href="{{ route('countries.show', $country) }}">{{ $country->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $region->name }}</li>
            </ol>
        </nav>
        <div class="row">
            @foreach($groups->split(3) as $chunk)
                <div class="col-sm">
                    <ul class="list-group">
                        @foreach ($chunk as $group)
                            <a class="list-group-item list-group-item-action" href="{{ route('groups.show', [$group->region->country, $group->region, $group]) }}">{{ $group->name }}</a>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
@endsection
