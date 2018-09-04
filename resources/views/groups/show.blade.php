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
            @each('posts.partials.post', $posts, 'post')
        </div>

        {{ $posts->links() }}
    </div>
@endsection
