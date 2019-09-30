@extends('layouts.form')

@section('title', "Settings for group->name")

@section('form')
    <form action="{{ route('memberships.update', $group) }}" method="POST">
        @method('PATCH')
        @csrf

        <div class="form-group">
            <label for="email_prefs">{{ __('Email preference') }}</label>
            <select class="form-control" name="email_prefs">
                <option value="1" {{ ($membership->email_prefs == 1) ? 'selected' : '' }}>None apart from Admin</option>
                <option value="2" {{ ($membership->email_prefs == 2) ? 'selected' : '' }}>One for each Post</option>
                <option value="3" {{ ($membership->email_prefs == 3) ? 'selected' : '' }}>Daily digest</option>
            </select>
            @if ($errors->has('email_prefs'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email_prefs') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="submit" class="btn btn-danger">Leave group</button>
            </div>
        </div>
    </form>
@endsection
