<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team; // Importar el modelo Team
use Faker\Factory as Faker;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Vaciar la tabla. 
        Team::truncate();
        
        $faker = Faker::create();

        // Crear equipos ficticios en la tabla
        for ($i = 0; $i < 30; $i++) {
            Team::create([
                'conference' => $faker->randomElement(['Eastern', 'Western']),
                'division' => $faker->randomElement(['Atlantic', 'Central', 'Southeast', 'Northwest', 'Pacific', 'Southwest']),
                'city' => $faker->city,
                'name' => $faker->unique()->word,
                'full_name' => $faker->company,
                'abbreviation' => $faker->lexify('???'),
            ]);
        }
    }
}
