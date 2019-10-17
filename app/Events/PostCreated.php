<?php

namespace Opencycle\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Opencycle\Post;

class PostCreated
{
    use Dispatchable, SerializesModels;

    /**
     * The post that was created.
     *
     * @var Post
     */
    public $post;

    /**
     * Create a new event instance.
     *
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }
}
