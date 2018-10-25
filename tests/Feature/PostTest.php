<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Notification;
use Opencycle\Notifications\PostReply;
use Opencycle\Post;
use Opencycle\User;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * Test a user can create a new post.
     *
     * @return void
     */
    public function testUserCanCreatePost()
    {
        $user = factory(User::class)->states('withGroup')->create();
        $group = $user->groups->first();

        $newData = [
            'title' => $this->faker->userName,
            'location' => $this->faker->city,
            'group' => $group->id,
            'description' => $this->faker->email,
        ];

        $this->actingAs($user)->post(route('posts.store'), $newData);

        $this->assertDatabaseHas('posts', [
            'title' => $newData['title'],
            'location' => $newData['location'],
            'group_id' => $group->id,
            'user_id' => $user->id,
            'description' =>$newData['description'],
        ]);
    }

    /**
     * Test a user can reply to a post.
     *
     * @return void
     */
    public function testUserCanReplyToPost()
    {
        $user = factory(User::class)->states('withGroup')->create();
        $post = factory(Post::class)->create([
            'group_id' => $user->groups->first()->id,
        ]);

        $data = [
            'message' => $this->faker->paragraph,
        ];

        Notification::fake();

        $this->actingAs($user)->post(route('posts.reply.store', $post), $data);

        Notification::assertSentTo(
            $post->user,
            PostReply::class
        );
    }
}
