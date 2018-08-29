@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($countries as $country)
            <a href="{{ route('countries.show', $country) }}">{{ $country->name }}</a>
        @endforeach
    </div>

    {{ $countries->links() }}
@endsection
