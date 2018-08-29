@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        {{ $post->user->username }}
        {{ $post->description }}
    </div>
@endsection
