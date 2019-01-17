<?php

use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipes')->insert([
            'name' => 'Scrambled Eggs',
            'ingredients' => json_encode([
                156 => 4,
                224 => 0.25,
                277 => true,
                278 => true,
                30 => 2
            ]),
            'preparation' => json_encode([
                'BEAT eggs, milk, salt and pepper in medium bowl until blended.',
                'HEAT butter in large nonstick skillet over medium heat until hot. POUR IN egg mixture. As eggs begin to set, GENTLY PULL the eggs across the pan with a spatula, forming large soft curds.',
                'CONTINUE cooking – pulling, lifting and folding eggs – until thickened and no visible liquid egg remains. Do not stir constantly. REMOVE from heat. SERVE immediately.'
            ])
        ]);

        DB::table('recipes')->insert([
            'name' => 'Aufgeschnitter Apfel mit Zimt',
            'ingredients' => json_encode([
                1 => 1,
                69 => true
            ]),
            'preparation' => json_encode([
                'Cut apple',
                'Put cinnamon on it',
            ])
        ]);

        DB::table('recipes')->insert([
            'name' => '2 Aufgeschnitte Äpfel mit Zimt',
            'ingredients' => json_encode([
                1 => 2,
                69 => true
            ]),
            'preparation' => json_encode([
                'Cut first apple',
                'Cut second apple',
                'Put cinnamon on it',
            ])
        ]);
    }
}
