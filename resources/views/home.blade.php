@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body text-center">
                        <p>Welcome, there are {{ $groups }} groups and {{ $users }} users.</p>

                        <form class="form-inline justify-content-center" method="POST" action="{{ route('search') }}">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" name="query" placeholder="Find a group near you">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
