<?php

namespace Tests\Feature;

use Opencycle\Region;
use Opencycle\User;
use Tests\TestCase;

class RegionTest extends TestCase
{
    /**
     * Test anyone can view a region page.
     *
     * @return void
     */
    public function testAnyoneCanViewRegionPage()
    {
        $region = factory(Region::class)->create();
        $response = $this->get(route('regions.show', [$region->country, $region]));

        $response->assertOk();
        $response->assertSee($region->name);
    }

    /**
     * Test a user can view a region page.
     *
     * @return void
     */
    public function testUserCanViewRegionPage()
    {
        $user = factory(User::class)->states('withGroup')->create();
        $region = factory(Region::class)->create();

        $response = $this->actingAs($user)->get(route('regions.show', [$region->country, $region]));

        $response->assertOk();
        $response->assertSee($region->name);
    }
}
