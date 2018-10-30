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
        $user = factory(User::class)->states('withGroup')->create();
        $group = $user->groups->first();

        $this->actingAs($user)->patch(route('memberships.store', $group));

        $this->assertEquals($user->groups->first()->id, $group->id);
        $this->assertNull($user->groups->first()->membership->role);
    }

    /**
     * Test a user can leave a group.
     *
     * @return void
     */
    public function testUserCanLeaveAGroup()
    {
        $user = factory(User::class)->states('withGroup')->create();
        $group = $user->groups->first();

        $this->actingAs($user)->delete(route('memberships.destroy', $group));

        $this->assertNull($user->fresh()->groups->first());
    }
}
