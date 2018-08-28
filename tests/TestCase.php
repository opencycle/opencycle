<?php

namespace Tests;

use Faker\Factory;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Instance of Faker.
     *
     * @var Generator
     */
    protected $faker;

    /**
     * Set up tests.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $this->faker = Factory::create(config('app.locale'));
    }
}
