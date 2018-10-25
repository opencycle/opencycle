@component('mail::message')
# New Reply

{{ $user->username }} sent you a message about your post {{ $post->id }}

{{ $message }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
