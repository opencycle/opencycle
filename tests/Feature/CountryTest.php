<?php

namespace Tests\Feature;

use Opencycle\Country;
use Tests\TestCase;

class CountryTest extends TestCase
{
    /**
     * Test a user can view a list of countries.
     *
     * @return void
     */
    public function testAnyoneCanViewListOfCountryPage()
    {
        $country = factory(Country::class)->create();

        $response = $this->get(route('countries.index'));

        $response->assertOk();
        $response->assertSee($country->name);
    }

    /**
     * Test a user can view a country page.
     *
     * @return void
     */
    public function testAnyoneCanViewCountryPage()
    {
        $country = factory(Country::class)->create();

        $response = $this->get(route('countries.show', $country));

        $response->assertOk();
        $response->assertSee($country->name);
    }
}
