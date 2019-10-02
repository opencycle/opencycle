<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\HomePage;

class HomeTest extends DuskTestCase
{
    /**
     * Test we can view the home page.
     *
     * @return void
     * @throws \Throwable
     */
    public function testHomePage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new HomePage)
                    ->assertSee('Opencycle');
        });
    }
}
