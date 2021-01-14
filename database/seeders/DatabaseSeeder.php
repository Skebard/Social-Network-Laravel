<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(100)->create();
        $this->call([
            PostSeeder::class,
            PostImageSeeder::class,
            RelationshipSeeder::class,
            //PostCommentSeeder::class,
            //postSavedSeeder::class,
        ]);
    }
}
