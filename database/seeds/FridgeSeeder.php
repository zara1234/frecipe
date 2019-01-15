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
        DB::table('fridges')->insert([
            'user_id' => 1,
            'groceries' => json_encode([
                1, 2, 3, 4
            ])
        ]);
    }
}
