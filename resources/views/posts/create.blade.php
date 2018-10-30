@extends('layouts.form')

@section('title', 'Create Post')

@section('form')
    <form action="{{ route('posts.store') }}" method="POST" id="post-create">
        @csrf

        <div class="form-group">
            <label for="title">{{ __('Title') }}</label>
            <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="title" placeholder="Post title" value="{{ old('title') }}" required autofocus>
            @if ($errors->has('title'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="location">{{ __('Location') }}</label>
            <input type="text" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location" id="location" placeholder="Item location" value="{{ old('location') }}" required>
            @if ($errors->has('location'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('location') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="group">{{ __('Group') }}</label>
            <select class="form-control" name="group">
                @foreach ($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('$group'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('$group') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="description">{{ __('Description') }}</label>
            <textarea class="form-control" style="height:150px" name="description" placeholder="Description of the item"></textarea>
            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="description">{{ __('Images') }}</label>
            <div id="image-uploader"></div>
            @if ($errors->has('images'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('images') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
