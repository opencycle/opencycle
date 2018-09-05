<?php

namespace Tests\Feature;

use Opencycle\User;
use Opencycle\Group;
use Tests\TestCase;

class GroupTest extends TestCase
{
    /**
     * Test a user can join a group.
     *
     * @return void
     */
    public function testUserCanJoinAGroup()
    {
        $user = factory(User::class)->create();
        $group = factory(Group::class)->create();

        $this->actingAs($user)->patch(route('groups.join', $group));

        $this->assertEquals($user->groups->first()->id, $group->id);
        $this->assertNull($user->groups->first()->membership->role);
    }
}
