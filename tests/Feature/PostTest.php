<?php

namespace Tests\Feature;

use Opencycle\Group;
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
        $user = factory(User::class)->create();
        $group = factory(Group::class)->create();

        $newData = [
            'title' => $this->faker->userName,
            'group' => $group->id,
            'description' => $this->faker->email,
        ];

        $this->actingAs($user)->post(route('posts.store'), $newData);

        $this->assertDatabaseHas('posts', [
            'title' => $newData['title'],
            'group_id' => $group->id,
            'user_id' => $user->id,
            'description' =>$newData['description'],
        ]);
    }
}
