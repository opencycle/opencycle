<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * Test a user can register.
     *
     * @return void
     */
    public function testUserCanRegister()
    {
        $this->post(route('users.store'), [
            'username' => $this->faker->userName,
            'email' => $this->faker->email,
            'password' => 'test123456',
            'password_confirmation' => 'test123456',
        ]);

        $this->assertAuthenticated();
    }
}
