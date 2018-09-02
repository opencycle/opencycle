<?php

use Illuminate\Database\Seeder;
use Opencycle\Group;
use Opencycle\Post;
use Opencycle\Region;

class DevelopmentSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Region::class, 5)->create()->each(function ($region) {
            factory(Group::class, 5)->create([
                'region_id' => $region->id,
            ])->each(function ($group) {
                factory(Post::class, 10)->create([
                    'group_id' => $group->id,
                ]);
            });
        });
    }
}
