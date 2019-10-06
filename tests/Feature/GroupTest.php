<?php

namespace Tests\Feature;

use Opencycle\User;
use Opencycle\Group;
use Tests\TestCase;

class GroupTest extends TestCase
{
    /**
     * Test anyone can view a group page.
     *
     * @return void
     */
    public function testAnyoneCanViewGroupPage()
    {
        $group = factory(Group::class)->create();
        $response = $this->get(route('groups.show', [$group->region->country, $group->region, $group]));

        $response->assertOk();
        $response->assertSee($group->name);
    }

    /**
     * Test a user can view a group page.
     *
     * @return void
     */
    public function testUserCanViewGroupPage()
    {
        $user = factory(User::class)->states('withGroup')->create();
        $group = $user->groups->first();
        $response = $this->actingAs($user)->get(route('groups.show', [$group->region->country, $group->region, $group]));

        $response->assertOk();
        $response->assertSee($group->name);
    }

    /**
     * Test a user can view a list if their groups.
     *
     * @return void
     */
    public function testUserCanViewListOfTheirGroupsPage()
    {
        $user = factory(User::class)->states('withGroup')->create();
        $group = $user->groups->first();
        $response = $this->actingAs($user)->get(route('groups.user', $group));

        $response->assertOk();
        $response->assertSee($group->name);
    }

    /**
     * Test an admin user can view the edit group page.
     *
     * @return void
     */
    public function testAdminUserCanViewEditGroupPage()
    {
        $user = factory(User::class)->states('withAdminGroup')->create();
        $group = $user->groups->first();
        $response = $this->actingAs($user)->get(route('groups.edit', $group));

        $response->assertOk();
    }

    /**
     * Test a moderator user cannot view the edit group page.
     *
     * @return void
     */
    public function testModeratorUserCannotViewEditGroupPage()
    {
        $user = factory(User::class)->states('withModeratorGroup')->create();
        $group = $user->groups->first();
        $response = $this->actingAs($user)->get(route('groups.edit', $group));

        $response->assertForbidden();
    }

    /**
     * Test a user cannot view the edit group page.
     *
     * @return void
     */
    public function testUserCannotViewEditGroupPage()
    {
        $user = factory(User::class)->states('withGroup')->create();
        $group = $user->groups->first();
        $response = $this->actingAs($user)->get(route('groups.edit', $group));

        $response->assertForbidden();
    }

    /**
     * Test an admin user can update group preferences.
     *
     * @return void
     */
    public function testAdminUserCanUpdateAGroup()
    {
        $user = factory(User::class)->states('withAdminGroup')->create();
        $group = $user->groups->first();

        $this->actingAs($user)->patch(route('groups.update', $group), [
            'name' => 'test',
            'description' => 'test'
        ]);

        $this->assertEquals('test', $group->fresh()->name);
    }

    /**
     * Test a moderator user cannot update group preferences.
     *
     * @return void
     */
    public function testModeratorUserCannotUpdateAGroup()
    {
        $user = factory(User::class)->states('withModeratorGroup')->create();
        $group = $user->groups->first();

        $response = $this->actingAs($user)->patch(route('groups.update', $group), [
            'name' => 'test',
            'description' => 'test'
        ]);

        $response->assertForbidden();
    }

    /**
     * Test a user cannot update group preferences.
     *
     * @return void
     */
    public function testUserCannotUpdateAGroup()
    {
        $user = factory(User::class)->states('withGroup')->create();
        $group = $user->groups->first();

        $response = $this->actingAs($user)->patch(route('groups.update', $group), [
            'name' => 'test',
            'description' => 'test'
        ]);

        $response->assertForbidden();
    }
}
