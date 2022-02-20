<?php

namespace Database\Seeders;

use App\Models\Category;
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
       //Category::factory()
       //    ->count(5)
       //    ->hasMovies(3)
       //    ->create();

        $this->call([
            UserSeeder::class,
        ]);
    }
}
