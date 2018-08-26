@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($adverts as $advert)
            <a href="{{ route('adverts.show', $advert) }}">{{ $advert->title }}</a>
        @endforeach
    </div>

    {{ $adverts->links() }}
@endsection
