@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('groups.show', [$country, $region, $group]) }}">Back to group</a></li>
                    </ol>
                </nav>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="https://placeimg.com/750/750/any" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="https://placeimg.com/750/750/animals" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="https://placeimg.com/750/750/nature" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        <h4 class="m-0">{{ $post->title }}</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $post->description }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Post ID: #{{ $post->id }}</li>
                        <li class="list-group-item">Location: {{ $post->location }}</li>
                        <li class="list-group-item">Posted by {{ $post->user->username }}</li>
                        <li class="list-group-item">Date: {{ $post->created_at }}</li>
                        <li class="list-group-item">
                            <div class="btn-group">
                                @can('reply', $post)
                                    <a class="btn btn-sm btn-outline-primary" href="{{ route('posts.reply.create', $post) }}">Reply</a>
                                @endcan
                                <a href="#" class="btn btn-sm btn-outline-primary" role="button">Report</a>
                                <a href="#" class="btn btn-sm btn-outline-primary" role="button">Share</a>
                                @can('update', $post)
                                    <a class="btn btn-sm btn-outline-primary" href="{{ route('posts.edit', $post) }}">
                                        Edit
                                    </a>
                                @endcan
                                @can('delete', $post)
                                    <a href="{{ route('posts.destroy', $post) }}"
                                       onclick="event.preventDefault(); document.getElementById('delete-form-{{ $post->id }}').submit();" class="btn btn-sm btn-outline-danger" role="button">Delete</a>
                                    <form id="delete-form-{{ $post->id }}" action="{{ route('posts.destroy', $post) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                @endcan
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
