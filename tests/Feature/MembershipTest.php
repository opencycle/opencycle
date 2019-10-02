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
        $this->assertNull($user->getMembership($group)->role);
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
     * Test a user cannot leave a group they are not a member of.
     *
     * @return void
     */
    public function testUserCannotLeaveAGroupTheyAreNotAMemberOf()
    {
        $user = factory(User::class)->create();
        $group = factory(Group::class)->create();

        $response = $this->actingAs($user)->delete(route('memberships.destroy', $group));

        $response->assertForbidden();
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
     * Test a user cannot view the edit group preferences page of a group they are not a member of.
     *
     * @return void
     */
    public function testUserCannotViewEditGroupPreferencesPageTheyAreNotAMemberOf()
    {
        $user = factory(User::class)->create();
        $group = factory(Group::class)->create();

        $response = $this->actingAs($user)->get(route('memberships.edit', $group));

        $response->assertForbidden();
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

    /**
     * Test a user can update group preferences of a group they are not a member of.
     *
     * @return void
     */
    public function testUserCannotUpdateGroupPreferencesTheyAreNotAMemberOf()
    {
        $user = factory(User::class)->create();
        $group = factory(Group::class)->create();

        $response = $this->actingAs($user)->patch(route('memberships.update', $group), [
            'email_prefs' => 2
        ]);

        $response->assertForbidden();
    }
}
