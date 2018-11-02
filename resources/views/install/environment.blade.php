@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="card">
                    <div class="card-header">{{ __('Environment') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('install.environment.store') }}">
                            @csrf

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="environment-tab" data-toggle="tab" href="#environment" role="tab" aria-controls="environment" aria-selected="true">Environment</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="database-tab" data-toggle="tab" href="#database" role="tab" aria-controls="database" aria-selected="false">Database</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="email-tab" data-toggle="tab" href="#email" role="tab" aria-controls="email" aria-selected="false">Email</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="environment" role="tabpanel" aria-labelledby="environment-tab">
                                    <div class="form-group">
                                        <label for="title">{{ __('App Name') }}</label>
                                        <input type="text" class="form-control{{ $errors->has('app_name') ? ' is-invalid' : '' }}" name="app_name" id="app_name" placeholder="Opencycle" value="{{ old('app_name') }}" required autofocus>
                                        @if ($errors->has('app_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('app_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="title">{{ __('Environment') }}</label>
                                        <input type="text" class="form-control{{ $errors->has('environment') ? ' is-invalid' : '' }}" name="environment" id="environment" placeholder="production" value="{{ old('environment') }}" required autofocus>
                                        @if ($errors->has('environment'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('environment') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="title">{{ __('Debug') }}</label>
                                        <input type="text" class="form-control{{ $errors->has('app_debug') ? ' is-invalid' : '' }}" name="app_debug" id="app_debug" placeholder="false" value="{{ old('app_debug') }}" required autofocus>
                                        @if ($errors->has('app_debug'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('app_debug') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="title">{{ __('App URL') }}</label>
                                        <input type="text" class="form-control{{ $errors->has('app_url') ? ' is-invalid' : '' }}" name="app_url" id="app_url" placeholder="https://opencycle.org" value="{{ old('app_url') }}" required autofocus>
                                        @if ($errors->has('app_url'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('app_url') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="database" role="tabpanel" aria-labelledby="database-tab">...</div>
                                <div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="email-tab">...</div>
                            </div>



                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Next') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
