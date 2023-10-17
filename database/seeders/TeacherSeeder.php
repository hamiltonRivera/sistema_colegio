<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teacher;
use App\Models\User;
use Faker\Factory as Faker;
use Spatie\Permission\Models\Role;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //creando fakers *10
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            $firstName = $faker->firstName;
            $lastName = $faker->lastName;

            //creando los usuarios
            $user = User::create([
                'name' => $firstName . ' ' . $lastName,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('password'),
                'user_name' => $faker->userName
            ]);

            //obtener el rol de docente
            $docenteRole = Role::where('name', 'Docente')->first();

            //asignando rol al usuario
            $user->assignRole($docenteRole);

            Teacher::create([
                'first_second_name' => $firstName,
                'first_second_last_name' => $lastName,
                'cedula' => $faker->numberBetween(1000000000000, 9999999999999), // Cedula de 13 dígitos
                'inss' => $faker->numberBetween(100000000000, 999999999999), // INSS de 12 dígitos
                'phone_number' => $faker->numerify('#########'), // Número de teléfono de 9 dígitos
                'email' => $user->email,
                'user_id' => $user->id,
                'status' => 'Activo'
            ]);
        }
    }
}
