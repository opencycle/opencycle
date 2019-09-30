<?php

namespace Tests\Feature;

use Opencycle\User;
use Opencycle\Group;
use Tests\TestCase;

class MembershipTest extends TestCase
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

        $this->actingAs($user)->post(route('memberships.store', $group));

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

    /**
     * Test a user can view the edit group preferences page.
     *
     * @return void
     */
    public function testUserCanViewEditGroupPreferencesPage()
    {
        $user = factory(User::class)->states('withGroup')->create();
        $group = $user->groups->first();
        $response = $this->actingAs($user)->get(route('memberships.edit', $group));

        $response->assertOk();
    }

    /**
     * Test a user can update group preferences.
     *
     * @return void
     */
    public function testUserCanUpdateGroupPreferences()
    {
        $user = factory(User::class)->states('withGroup')->create();
        $group = $user->groups->first();

        $this->actingAs($user)->patch(route('memberships.update', $group), [
            'email_prefs' => 2
        ]);

        $user->setRelations([]); // h4x https://laracasts.com/discuss/channels/testing/refresh-a-model?page=1

        $this->assertEquals(2, $user->getMembership($group)->email_prefs);
    }
}
