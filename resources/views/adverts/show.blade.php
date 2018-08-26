@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $advert->title }}</h1>
        {{ $advert->user->username }}
        {{ $advert->description }}
    </div>
@endsection
