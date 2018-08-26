@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($adverts as $advert)
            {{ $advert->title }}
        @endforeach
    </div>

    {{ $adverts->links() }}
@endsection
