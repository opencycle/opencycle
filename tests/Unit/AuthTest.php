<?php

namespace Tests\Unit;

use Opencycle\Role;
use Opencycle\User;
use Opencycle\Group;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * Test a user can be assigned a role for a group.
     *
     * @return void
     */
    public function testUserGroupMembershipRoles()
    {
        $user = factory(User::class)->create();
        $group = factory(Group::class)->create();
        $role = Role::ofType(Role::MODERATOR);

        $user->groups()->save($group, ['role_id' => $role->id]);

        $this->assertTrue($user->groups->first()->membership->hasRole($role));
    }
}
