@extends('layouts.app')

@section('title', 'An open source classified ads platform')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body text-center">
                        <p>Welcome, there are {{ $groups }} groups and {{ $users }} users.</p>

                        <form class="form-inline justify-content-center" method="GET" action="{{ route('search') }}">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="text" class="form-control{{ $errors->has('query') ? ' is-invalid' : '' }}" name="query" placeholder="Find a group near you">
                                    @if ($errors->has('query'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('query') }}</strong>
                                        </span>
                                    @endif
                                    <input type="hidden" name="geo">
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="submit">
                                            <i class="fas fa-search"></i>
                                            Search
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
