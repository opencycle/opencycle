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
        $post = factory(Post::class)->create();

        $newData = [
            'title' => $this->faker->userName,
            'location' => $this->faker->city,
            'group' => $post->group->id,
            'description' => $this->faker->email,
        ];

        $this->actingAs($post->user)->post(route('posts.store'), $newData);

        $this->assertDatabaseHas('posts', [
            'title' => $newData['title'],
            'location' => $newData['location'],
            'group_id' => $post->group->id,
            'user_id' => $post->user->id,
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

    /**
     * Test a user can update an existing post.
     *
     * @return void
     */
    public function testUserCanEditPost()
    {
        $post = factory(Post::class)->create();

        $newData = [
            'title' => $this->faker->userName,
            'location' => $this->faker->city,
            'description' => $this->faker->email,
        ];

        $this->actingAs($post->user)->patchJson(route('posts.update', $post), $newData);

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => $newData['title'],
            'location' => $newData['location'],
            'group_id' => $post->group->id,
            'user_id' => $post->user->id,
            'description' =>$newData['description'],
        ]);
    }

    /**
     * Test a user can delete an existing post.
     *
     * @return void
     */
    public function testUserCanDeletePost()
    {
        $post = factory(Post::class)->create();

        $this->actingAs($post->user)->deleteJson(route('posts.destroy', $post));

        $this->assertDatabaseMissing('posts', [
            'id' => $post->id,
        ]);
    }
}
