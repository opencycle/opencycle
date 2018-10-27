@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body text-center">
                        Welcome, there are {{ $groups }} groups and {{ $users }} users.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
