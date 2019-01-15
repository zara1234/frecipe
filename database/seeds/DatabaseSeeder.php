<?php

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

        // php artisan migrate:fresh --seed

        $this->call(UserSeeder::class);
        $this->call(GrocerySeeder::class);
        $this->call(RecipeSeeder::class);
    }
}
