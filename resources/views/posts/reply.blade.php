@extends('layouts.form')

@section('title', "Reply to Post: $post->title")

@section('form')
    <form action="{{ route('posts.reply.store', $post) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="message">{{ __('Message') }}</label>
            <textarea class="form-control" style="height:150px" name="message" placeholder="Message to the poster"></textarea>
            @if ($errors->has('message'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('message') }}</strong>
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
