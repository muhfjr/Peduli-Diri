<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Perjalanan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Perjalanan::factory(1)->create();
    }
}
