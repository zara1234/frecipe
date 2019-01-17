<?php

use Illuminate\Database\Seeder;

class FridgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // groceryID => amount
        DB::table('fridges')->insert([
            'user_id' => 1,
            'groceries' => json_encode([
                1 => 1,
                2 => 2,
                3 => 42,
                4 => 12,
                32 => 8,
                156 => 4,
                69 => 100
            ])
        ]);
    }
}
