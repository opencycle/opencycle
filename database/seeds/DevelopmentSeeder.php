<?php

use Illuminate\Database\Seeder;
use Opencycle\Group;
use Opencycle\Post;
use Opencycle\Region;
use Opencycle\User;
use Opencycle\Role;
use Opencycle\Country;

class DevelopmentSeeder extends Seeder
{
    const COUNTRIES_TO_SEED = 10;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'email' => 'admin@opencycle.com',
            'password' => bcrypt('password'),
            'role_id' => Role::where('name', 'admin')->first()->id,
        ]);

        $this->command->getOutput()->progressStart(self::COUNTRIES_TO_SEED);

        factory(Country::class, self::COUNTRIES_TO_SEED)->create()->each(function ($country) {
            $states = $country->info->hydrateStates()->states;

            if ($states->count() > 0) {
                $states->shuffle()->take(5)->each(function ($state) use ($country) {
                    $cities = $country->info->hydrateCities()->cities->where('adm1name', $state->extra->woe_name)->take(5);

                    if ($cities->count() > 0) {
                        $region = factory(Region::class)->create([
                            'name' => $state->name,
                            'country_id' => $country->id,
                        ]);

                        $cities->each(function ($city) use ($region) {
                            $group = factory(Group::class)->create([
                                'name' => $city->name,
                                'region_id' => $region->id,
                            ]);

                            factory(Post::class, 10)->create([
                                'group_id' => $group->id,
                            ]);
                        });
                    }
                });
            }

            $this->command->getOutput()->progressAdvance();
        });

        $this->command->getOutput()->progressFinish();
    }
}
