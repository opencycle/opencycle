@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($posts as $post)
            <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
        @endforeach
    </div>

    {{ $posts->links() }}
@endsection
