<?php

namespace Tests\Feature;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Notification;
use Opencycle\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;

class AuthTest extends TestCase
{
    /**
     * Test a user can login.
     *
     * @return void
     */
    public function testUserCanLogin()
    {
        $user = factory(User::class)->create([
            'password' => Hash::make('test')
        ]);

        $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'test',
        ]);

        $this->assertAuthenticatedAs($user);
    }

    /**
     * Test a user cannot login with invalid password.
     *
     * @return void
     */
    public function testUserCannotLoginWithInvalidPassword()
    {
        $user = factory(User::class)->create([
            'password' => Hash::make('test')
        ]);

        $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'wrong',
        ]);

        $this->assertGuest();
    }

    /**
     * Test a user can logout.
     *
     * @return void
     */
    public function testUserCanLogout()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)->post(route('logout'));

        $this->assertGuest();
    }

    /**
     * Test a user can reset their password.
     *
     * @return void
     */
    public function testUserCanResetPassword()
    {
        Notification::fake();

        $user = factory(User::class)->create();

        $this->post(route('password.email'), [
            'email' => $user->email,
        ]);

        Notification::assertSentTo(
            $user,
            ResetPassword::class
        );
    }
}
