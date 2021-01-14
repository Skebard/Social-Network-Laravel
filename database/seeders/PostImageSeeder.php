<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\PostImage::factory(80)->create();
    }
}
