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

        $post->group->users->filter(function (User $user) use ($post) {
            return $user->id !== $post->user->id;
        })->each(function (User $user) use ($post) {
            $membership = $user->getMembership($post->group);

            if ($membership->email_prefs === Membership::NOTIFY_EACH) {
                $user->notify(new NewPost($post));
            }
        });
    }
}
