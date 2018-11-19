@extends('layouts.install')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('install.environment.store') }}">
            @csrf
            <div class="row">
                <div class="col-6 offset-3">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="environment-tab" data-toggle="tab" href="#environment" role="tab" aria-controls="environment" aria-selected="true">Environment</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="database-tab" data-toggle="tab" href="#database" role="tab" aria-controls="database" aria-selected="false">Database</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="email-tab" data-toggle="tab" href="#email" role="tab" aria-controls="email" aria-selected="false">Email</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="other-tab" data-toggle="tab" href="#other" role="tab" aria-controls="other" aria-selected="false">Other</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
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
                                <div class="tab-pane fade" id="database" role="tabpanel" aria-labelledby="database-tab">
                                    <div class="form-group">
                                        <label for="title">{{ __('Connection') }}</label>
                                        <input type="text" class="form-control{{ $errors->has('db_connection') ? ' is-invalid' : '' }}" name="db_connection" id="db_connection" placeholder="mysql" value="{{ old('db_connection') }}" required autofocus>
                                        @if ($errors->has('db_connection'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('db_connection') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="title">{{ __('Hostname') }}</label>
                                        <input type="text" class="form-control{{ $errors->has('db_host') ? ' is-invalid' : '' }}" name="db_host" id="db_host" placeholder="127.0.0.1" value="{{ old('db_host') }}" required autofocus>
                                        @if ($errors->has('db_host'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('db_host') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="title">{{ __('Port') }}</label>
                                        <input type="text" class="form-control{{ $errors->has('db_port') ? ' is-invalid' : '' }}" name="db_port" id="db_port" placeholder="3306" value="{{ old('db_port') }}" required autofocus>
                                        @if ($errors->has('db_port'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('db_port') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="title">{{ __('Database') }}</label>
                                        <input type="text" class="form-control{{ $errors->has('db_database') ? ' is-invalid' : '' }}" name="db_database" id="db_database" placeholder="opencycle" value="{{ old('db_database') }}" required autofocus>
                                        @if ($errors->has('db_database'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('db_database') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="title">{{ __('Username') }}</label>
                                        <input type="text" class="form-control{{ $errors->has('db_username') ? ' is-invalid' : '' }}" name="db_username" id="db_username" placeholder="homestead" value="{{ old('db_username') }}" required autofocus>
                                        @if ($errors->has('db_username'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('db_username') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="title">{{ __('Password') }}</label>
                                        <input type="password" class="form-control{{ $errors->has('db_password') ? ' is-invalid' : '' }}" name="db_password" id="db_password" placeholder="secret" value="{{ old('db_password') }}" required autofocus>
                                        @if ($errors->has('db_password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('db_password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="email-tab">
                                    <div class="form-group">
                                        <label for="title">{{ __('Driver') }}</label>
                                        <input type="text" class="form-control{{ $errors->has('mail_driver') ? ' is-invalid' : '' }}" name="mail_driver" id="mail_driver" placeholder="smtp" value="{{ old('mail_driver') }}" required autofocus>
                                        @if ($errors->has('mail_driver'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('mail_driver') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="title">{{ __('Hostname') }}</label>
                                        <input type="text" class="form-control{{ $errors->has('mail_host') ? ' is-invalid' : '' }}" name="mail_host" id="mail_host" placeholder="mail_driver" value="{{ old('mail_host') }}" required autofocus>
                                        @if ($errors->has('mail_host'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('mail_host') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="title">{{ __('Port') }}</label>
                                        <input type="text" class="form-control{{ $errors->has('mail_port') ? ' is-invalid' : '' }}" name="mail_port" id="mail_port" placeholder="2525" value="{{ old('mail_port') }}" required autofocus>
                                        @if ($errors->has('mail_port'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('mail_port') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="title">{{ __('Username') }}</label>
                                        <input type="text" class="form-control{{ $errors->has('mail_username') ? ' is-invalid' : '' }}" name="mail_username" id="mail_username" placeholder="null" value="{{ old('mail_username') }}" required autofocus>
                                        @if ($errors->has('mail_username'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('mail_username') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="title">{{ __('Password') }}</label>
                                        <input type="password" class="form-control{{ $errors->has('mail_password') ? ' is-invalid' : '' }}" name="mail_password" id="mail_password" placeholder="null" value="{{ old('mail_password') }}" required autofocus>
                                        @if ($errors->has('mail_password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('mail_password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="title">{{ __('Encryption') }}</label>
                                        <input type="text" class="form-control{{ $errors->has('mail_encryption') ? ' is-invalid' : '' }}" name="mail_encryption" id="mail_encryption" placeholder="null" value="{{ old('mail_encryption') }}" required autofocus>
                                        @if ($errors->has('mail_encryption'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('mail_encryption') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">
                                    <div class="form-group">
                                        <label for="title">{{ __('Nocaptcha Secret') }}</label>
                                        <input type="text" class="form-control{{ $errors->has('nopcatcha_secret') ? ' is-invalid' : '' }}" name="nopcatcha_secret" id="nopcatcha_secret" value="{{ old('nopcatcha_secret') }}" required autofocus>
                                        @if ($errors->has('nopcatcha_secret'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nopcatcha_secret') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="title">{{ __('Nocaptcha Sitekey') }}</label>
                                        <input type="text" class="form-control{{ $errors->has('nopcatcha_sitekey') ? ' is-invalid' : '' }}" name="nopcatcha_sitekey" id="nopcatcha_sitekey" value="{{ old('nopcatcha_sitekey') }}" required autofocus>
                                        @if ($errors->has('nopcatcha_sitekey'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nopcatcha_sitekey') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 offset-3 mt-3">
                    <button type="submit" class="btn btn-primary float-right">
                        {{ __('Next') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
