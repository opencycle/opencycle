<?php

namespace Tests\Feature;

use Opencycle\Region;
use Tests\TestCase;

class RegionTest extends TestCase
{
    /**
     * Test a user can view a region page.
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
}
