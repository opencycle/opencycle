<?php

namespace Tests\Feature;

use Opencycle\User;
use Opencycle\Group;
use Tests\TestCase;

class SearchTest extends TestCase
{
    /**
     * Test anyone can search for a group.
     *
     * @return void
     */
    public function testAnyoneCanSearchForGroup()
    {
        $group = factory(Group::class)->create();

        $response = $this->get(route('search', ['query' => $group->name]));

        $response->assertOk();
        $response->assertSee($group->name);
    }

    /**
     * Test a user can search for a group.
     *
     * @return void
     */
    public function testUserCanSearchForGroup()
    {
        $user = factory(User::class)->create();
        $group = factory(Group::class)->create();

        $response = $this->actingAs($user)->get(route('search', ['query' => $group->name]));

        $response->assertOk();
        $response->assertSee($group->name);
    }
}
