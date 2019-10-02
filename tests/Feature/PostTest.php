<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Event;
use Opencycle\Notifications\PostReply;
use Opencycle\Notifications\NewPost;
use Opencycle\Events\PostCreated;
use Opencycle\Post;
use Opencycle\User;
use Opencycle\Group;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * Test a user can view a list if their posts.
     *
     * @return void
     */
    public function testUserCanViewListOfTheirPostsPage()
    {
        $post = factory(Post::class)->create();

        $response = $this->actingAs($post->user)->get(route('posts.user', $post));

        $response->assertOk();
        $response->assertSee($post->name);
    }

    /**
     * Test a user can view the create post page.
     *
     * @return void
     */
    public function testUserCanViewCreatePostPage()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('posts.create'));

        $response->assertOk();
    }

    /**
     * Test a user can create a new post.
     *
     * @return void
     */
    public function testUserCanCreatePost()
    {
        Event::fake([
            PostCreated::class,
        ]);

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

        Event::assertDispatched(PostCreated::class);
    }

    /**
     * Test a user cannnot create a new post in a group they are not a member of.
     *
     * @return void
     */
    public function testUserCannotCreatePostWhenNotMemberOfGroup()
    {
        $user = factory(User::class)->states('withGroup')->create();
        $group = factory(Group::class)->create();

        $newData = [
            'title' => $this->faker->userName,
            'location' => $this->faker->city,
            'group' => $group->id,
            'description' => $this->faker->email,
        ];

        $response = $this->actingAs($user)->post(route('posts.store'), $newData);

        $response->assertForbidden();
    }

    /**
     * Test a user can view the reply to post page.
     *
     * @return void
     */
    public function testUserCanViewReplyToPostPage()
    {
        $user = factory(User::class)->states('withGroup')->create();
        $post = factory(Post::class)->create([
            'group_id' => $user->groups->first()->id,
        ]);

        $response = $this->actingAs($user)->get(route('posts.reply.create', $post));

        $response->assertOk();
    }

    /**
     * Test a user cannot view the reply to post page when not a member of post group.
     *
     * @return void
     */
    public function testUserCannotViewReplyToPostPageWhenNotMemberOfGroup()
    {
        $user = factory(User::class)->create();
        $post = factory(Post::class)->create();

        $response = $this->actingAs($user)->get(route('posts.reply.create', $post));

        $response->assertForbidden();
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
     * Test a user cannot reply to a post in a group they are not a member of.
     *
     * @return void
     */
    public function testUserCannotReplyToPostWhenNotMemberOfGroup()
    {
        $user = factory(User::class)->states('withGroup')->create();
        $post = factory(Post::class)->create();

        $data = [
            'message' => $this->faker->paragraph,
        ];

        $response = $this->actingAs($user)->post(route('posts.reply.store', $post), $data);

        $response->assertForbidden();
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
     * Test a user cannot update an existing post they do not own.
     *
     * @return void
     */
    public function testUserCannotEditPostTheyDontOwn()
    {
        $post = factory(Post::class)->create();
        $user = factory(User::class)->create();

        $newData = [
            'title' => $this->faker->userName,
            'location' => $this->faker->city,
            'description' => $this->faker->email,
        ];

        $response = $this->actingAs($user)->patchJson(route('posts.update', $post), $newData);

        $response->assertForbidden();
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

    /**
     * Test a user cannot delete an existing post they do not own.
     *
     * @return void
     */
    public function testUserCannotDeletePostTheyDontOwn()
    {
        $post = factory(Post::class)->create();
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->deleteJson(route('posts.destroy', $post));

        $response->assertForbidden();
    }

    /**
     * Test a user who has signed up to be notified is notified of a new post.
     *
     * @return void
     */
    public function testUserIsNotifiedOfNewPost()
    {
        Notification::fake();

        $user = factory(User::class)->states('withNotifiyEach')->create();
        $post = factory(Post::class)->create([
            'group_id' => $user->groups->first()->id,
        ]);

        event(new PostCreated($post));

        Notification::assertSentTo(
            $user,
            NewPost::class
        );
    }

    /**
     * Test a user who has not signed up to be notified is not notified of a new post.
     *
     * @return void
     */
    public function testUserIsNotNotifiedOfNewPost()
    {
        Notification::fake();

        $user = factory(User::class)->states('withGroup')->create();
        $post = factory(Post::class)->create([
            'group_id' => $user->groups->first()->id,
        ]);

        event(new PostCreated($post));

        Notification::assertNothingSent();
    }
}
