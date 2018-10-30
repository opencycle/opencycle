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
                        <a href="{{ route('posts.create', $group) }}" class="btn btn-sm btn-outline-primary">
                            Create a new post
                        </a>
                        <a href="#" class="btn btn-sm btn-outline-secondary">
                            Contact the mods
                        </a>
                        <a href="{{ route('memberships.edit', $group) }}" class="btn btn-sm btn-outline-secondary">
                            Group settings
                        </a>
                        <a href="{{ route('memberships.destroy', $group) }}"
                           onclick="event.preventDefault(); document.getElementById('delete-form').submit();" class="btn btn-sm btn-outline-danger" role="button">Leave group</a>
                        <form id="delete-form" action="{{ route('memberships.destroy', $group) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    @else
                        <a href="{{ route('memberships.store', $group) }}" class="btn btn-secondary"
                           onclick="event.preventDefault(); document.getElementById('join-form').submit();">
                            Join this group
                        </a>
                        <form id="join-form" action="{{ route('memberships.store', $group) }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endif
                @endauth
            </div>
        </div>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">All</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Offers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Wanted</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <table class="table table-hover table-no-top-border">
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
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
        </div>

        {{ $posts->links() }}
    </div>
@endsection
