<div class="flash-message text-center">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has($msg))
            <p class="alert alert-{{ $msg }}">{{ Session::get($msg) }}</p>
        @endif
    @endforeach
</div>
