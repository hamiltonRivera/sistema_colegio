<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      Course::create([
        'name' => 'Matemática'
      ]);
      Course::create([
        'name' => 'Lengua y Literatura'
      ]);
      Course::create([
        'name' => 'Lengua Extrajera (Inglés)'
      ]);
      Course::create([
        'name' => 'Química'
      ]);
      Course::create([
        'name' => 'Educación para aprender, emprender y prosperar'
      ]);
      Course::create([
        'name' => 'Física'
      ]);
      Course::create([
        'name' => 'Educación Física y práctica deportiva'
      ]);
      Course::create([
        'name' => 'Computación'
      ]);
      Course::create([
        'name' => 'Conducta'
      ]);
      Course::create([
        'name' => 'Geografia'
      ]);
      Course::create([
        'name' => 'Filosofia'
      ]);
      Course::create([
        'name' => 'Estudios sociales'
      ]);
    }
}
