@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Countries</a></li>
                <li class="breadcrumb-item"><a href="{{ route('countries.show', $country) }}">{{ $country->name }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('regions.show', [$country, $region]) }}">{{ $region->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $group->name }}</li>
            </ol>
        </nav>

        <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" alt="Thumbnail" src="https://placeimg.com/350/350/any">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->description }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('posts.show', $post) }}"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
                            </div>
                            <small class="text-muted">{{ $post->created_at }}</small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>


        {{ $posts->links() }}
    </div>
@endsection
