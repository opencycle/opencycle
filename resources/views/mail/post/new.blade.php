@component('mail::message')
# New Post

There has been a new post.

@component('mail::button', ['url' => route('posts.show', $post)])
View the post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
