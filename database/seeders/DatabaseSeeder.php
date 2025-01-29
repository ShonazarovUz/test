<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AdSeeder::class,
            AdTagSeeder::class, 
            \Database\Seeders\AdTagSeeder::class,
        ]);
    }
}
