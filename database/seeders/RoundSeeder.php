<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Round::factory(10)->create();
    }
}
