@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @each('posts.partials.post', $posts, 'post')
        </div>

        {{ $posts->links() }}
    </div>
@endsection
