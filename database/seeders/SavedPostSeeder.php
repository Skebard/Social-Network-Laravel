<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SavedPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\SavedPost::factory(100)->create();

    }
}
