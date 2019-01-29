<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Sarah Muehleder',
            'email' => 'sarah@frecipe.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'user_group' => 1
        ]);
    }
}
