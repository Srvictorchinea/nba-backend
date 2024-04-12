<?php

namespace Database\Seeders;

use App\Models\User; // Importa el modelo User
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Importa la clase Hash
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Vaciar la tabla.
        User::truncate();

        $faker = Faker::create();

        // Crear usuario administrador

        User::create([
            'name' => 'Administrador',
            'email' => 'admin@prueba.com',
            'password' => Hash::make(value: '123456'), // Hashea la contraseña con bcrypt
        ]);

        // Crear usuarios ficticios en la tabla
        for ($i = 0; $i < 5; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make(value: '123456'),
            ]);
        }
    }
}
