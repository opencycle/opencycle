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

        <div class="card mb-3">
            <div class="card-header">
                <h4 class="m-0">{{ $group->name }}</h4>
            </div>
            <div class="card-body">
                <p class="card-text">{{ $group->description }}</p>

                @auth
                    @if(Auth::user()->isMemberOf($group))
                        <a href="{{ route('posts.create', $group) }}" class="btn btn-primary">
                            Create a new post
                        </a>
                        <a href="#" class="btn btn-secondary">
                            Contact the mods
                        </a>
                    @else
                        <a href="{{ route('groups.join', $group) }}" class="btn btn-secondary"
                           onclick="event.preventDefault(); document.getElementById('join-form').submit();">
                            Join this group
                        </a>
                        <form id="join-form" action="{{ route('groups.join', $group) }}" method="POST" style="display: none;">
                            @csrf
                            @method('PATCH')
                        </form>
                    @endif
                @endauth
            </div>
        </div>

        <table class="table table-hover">
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <th scope="row">{{ $post->created_at }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->location }}</td>
                    <td>
                        <a class="btn btn-sm btn-outline-primary" href="{{ route('posts.show', $post) }}">View</a>
                        <a class="btn btn-sm btn-outline-primary" href="{{ route('posts.show', $post) }}">
                            Reply
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $posts->links() }}
    </div>
@endsection
