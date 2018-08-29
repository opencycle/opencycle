<?php

namespace Opencycle\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Opencycle\Post;

class PostCreated
{
    use Dispatchable, SerializesModels;

    /**
     * The post that was created.
     *
     * @var Post
     */
    private $post;

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
