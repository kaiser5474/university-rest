<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => $faker->email,
            'password' => Hash::make('password'),
        ]);

        $arrayCarrera = ['Informatica', 'Telecomunicaciones', 'Electrica', 'Mecanica', 'Quimica', 'Fisica', 'Matematicas'];
        $arrayTelefono = ['3242020', '3252020', '3262121', '3272222', '3282323', '3292424', ''];
        $arrayCelular = ['Informatica', 'Telecomunicaciones', 'Electrica', 'Mecanica', 'Quimica', 'Fisica', 'Matematicas'];
        
        //Para crear los estudiantes en la Base de Datos
        for ($i = 0; $i < 50; $i++) {
            
            \App\Models\Estudiante::create([
                'cedula' => $faker->numberBetween(1000000000, 9999999999),
                'correo' => $faker->unique()->email,
                'epn'=> $faker->numberBetween(100000000, 999999999),
                'carrera' => $arrayCarrera[rand(0,6)],
                'nombres' => $faker->name,
                'apellidos' => $faker->name,
                'telefono' => $faker->numberBetween(2000000, 7999999),
                'celular' => $faker->numberBetween(900000000, 999999999),
            ]);

            //Para crear los profesores en la Base de datos
            \App\Models\Profesor::create([
                'cedula' => $faker->numberBetween(1000000000, 9999999999),
                'correo' => $faker->unique()->email,
                'epn'=> $faker->numberBetween(100000000, 999999999),
                'departamento' => $arrayCarrera[rand(0,6)],
                'nombres' => $faker->name,
                'apellidos' => $faker->name,
                'telefono' => $faker->numberBetween(2000000, 7999999),
                'celular' => $faker->numberBetween(900000000, 999999999),
            ]);
        }
    }
}
