<?php

namespace Opencycle\Policies;

use Opencycle\Group;
use Opencycle\User;
use Opencycle\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the post.
     *
     * @return bool
     */
    public function view()
    {
        return true;
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param User $user
     * @param Group $group
     * @return mixed
     */
    public function create(User $user, Group $group)
    {
        return $user->isMemberOf($group);
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param User $user
     * @param Post $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        return $user->id === $post->user->id;
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param User $user
     * @param Post $post
     * @return mixed
     */
    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user->id;
    }

    /**
     * Determine whether the user can reply to the post.
     *
     * @param User $user
     * @param Post $post
     * @return mixed
     */
    public function reply(User $user, Post $post)
    {
        return $user->id !== $post->user->id && $user->isMemberOf($post->group);
    }
}
