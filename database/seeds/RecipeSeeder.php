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


        DB::table('recipes')->insert([
            'name' => 'French Omelette',
            'ingredients' => json_encode([
                155 => 2,
                236 => 1,
                276 => true,
                277 => true,
                290 => true,
                190 => true,
                300 => true

            ]),
            'preparation' => json_encode([
                'BEAT eggs, water, salt and pepper in small bowl until blended.',
                'HEAT butter in 6 to 8-inch nonstick omelet pan or skillet over medium-high heat until hot. TILT pan to coat bottom. POUR IN egg mixture. Mixture should set immediately at edges.',
                'GENTLY PUSH cooked portions from edges toward the center with inverted turner so that uncooked eggs can reach the hot pan surface. CONTINUE cooking, tilting pan and gently moving cooked portions as needed.',
                'When top surface of eggs is thickened and no visible liquid egg remains, PLACE filling on one side of the omelet. FOLD omelet in half with turner. With a quick flip of the wrist, turn pan and INVERT or SLIDE omelet onto plate. SERVE immediately.',
            ])
        ]);




    }
}
