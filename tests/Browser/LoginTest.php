<?php

namespace Tests\Browser;

use Illuminate\Support\Facades\Hash;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Opencycle\User;

class LoginTest extends DuskTestCase
{
    /**
     * Test a user can log in.
     *
     * @return void
     */
    public function testUserLogin()
    {
        $user = factory(User::class)->create([
            'password' => Hash::make('test')
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit(route('login'))
                    ->type('email', $user->email)
                    ->type('password', 'test')
                    ->press('Login')
                    ->assertRouteIs('home')
                    ->assertSee($user->username);
        });
    }
}
