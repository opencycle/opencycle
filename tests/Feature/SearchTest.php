<?php

namespace Tests\Feature;

use Opencycle\User;
use Tests\TestCase;

class SearchTest extends TestCase
{
    /**
     * Test a user can search for a group.
     *
     * @return void
     */
    public function testUserCanSearchForGroup()
    {
        $user = factory(User::class)->states('withGroup')->create();
        $group = $user->groups->first();

        $response = $this->actingAs($user)->get(route('search', ['query' => $group->name]));

        $response->assertOk();
        $response->assertSee($group->name);
    }
}
