<?php

namespace Tests\Feature;

use Anhskohbo\NoCaptcha\Facades\NoCaptcha;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Opencycle\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * Test a user can register.
     *
     * @return void
     */
    public function testUserCanRegister()
    {
        Event::fake([
            Registered::class,
        ]);

        NoCaptcha::shouldReceive('verifyResponse')
            ->once()
            ->andReturn(true);

        $this->post(route('users.store'), [
            'username' => $this->faker->userName,
            'email' => $this->faker->email,
            'password' => 'test123456',
            'password_confirmation' => 'test123456',
            'g-recaptcha-response' => '1',
        ]);

        $this->assertAuthenticated();

        Event::assertDispatched(Registered::class);
    }

    /**
     * Test a user can view their profile.
     *
     * @return void
     */
    public function testUserCanViewProfile()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('profile'));

        $response->assertSee($user->username);
    }

    /**
     * Test a user can edit their profile.
     *
     * @return void
     */
    public function testUserCanEditProfile()
    {
        $user = factory(User::class)->create();

        $newData = [
            'username' => $this->faker->userName,
            'email' => $this->faker->email,
        ];

        $this->actingAs($user)->patch(route('users.update', $user), $newData);

        $this->assertDatabaseHas('users', $newData);
    }

    /**
     * Test a user cannot edit other users profiles.
     *
     * @return void
     */
    public function testUserCannotEditOtherUsersProfile()
    {
        $user = factory(User::class)->create();
        $otherUser = factory(User::class)->create();

        $response = $this->actingAs($user)->patch(route('users.update', $otherUser), [
            'username' => $this->faker->userName,
            'email' => $this->faker->email,
        ]);

        $response->assertForbidden();
    }

    /**
     * Test a user can delete their profile.
     *
     * @return void
     */
    public function testUserCanDeleteProfile()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)->deleteJson(route('users.destroy', $user));

        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);
    }

    /**
     * Test a user can delete other users profiles.
     *
     * @return void
     */
    public function testUserCannotDeleteOtherUsersProfile()
    {
        $user = factory(User::class)->create();
        $otherUser = factory(User::class)->create();

        $response = $this->actingAs($user)->deleteJson(route('users.destroy', $otherUser));

        $response->assertForbidden();
    }
}
