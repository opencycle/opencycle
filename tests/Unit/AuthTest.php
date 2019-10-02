<?php

namespace Tests\Unit;

use Opencycle\Role;
use Opencycle\User;
use Opencycle\Group;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * Test a user does not normally have a role for a group.
     *
     * @return void
     */
    public function testUserDoesNotHaveGroupRole()
    {
        $user = factory(User::class)->create();
        $group = factory(Group::class)->create();
        $role = Role::ofType(Role::MODERATOR);

        $user->groups()->save($group);

        $this->assertFalse($user->getMembership($group)->hasRole($role));
    }

    /**
     * Test a user can be assigned a role for a group.
     *
     * @return void
     */
    public function testUserCanBeAssignedGroupRole()
    {
        $user = factory(User::class)->create();
        $group = factory(Group::class)->create();
        $role = Role::ofType(Role::MODERATOR);

        $user->groups()->save($group, ['role_id' => $role->id]);

        $this->assertTrue($user->getMembership($group)->hasRole($role));
    }
}
