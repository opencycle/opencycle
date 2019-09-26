<?php

namespace Tests\Feature;

use Opencycle\User;
use Tests\TestCase;

class GroupTest extends TestCase
{
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
