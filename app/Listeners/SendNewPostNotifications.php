<?php

namespace Opencycle\Listeners;

use Opencycle\Events\PostCreated;
use Opencycle\Membership;
use Opencycle\Notifications\NewPost;
use Opencycle\User;

class SendNewPostNotifications
{
    /**
     * Handle the event.
     *
     * @param  PostCreated  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        $post = $event->post;

        $post->group->users()
            ->where('id', '!=', $post->user->id)
            ->wherePivot('email_prefs', '=', Membership::NOTIFY_EACH)
            ->each(function (User $user) use ($post) {
                $user->notify(new NewPost($post));
            });
    }
}
