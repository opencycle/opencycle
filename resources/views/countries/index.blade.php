@extends('layouts.app')

@section('content')
    <div class="container">
        <ul class="list-group">
            @foreach ($countries as $country)
                <a class="list-group-item list-group-item-action" href="{{ route('countries.show', $country) }}">{{ $country->name }}</a>
            @endforeach
        </ul>
        {{ $countries->links() }}
    </div>
@endsection
