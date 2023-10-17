<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Grade;
class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
       Grade::create(
        [
            'grade_section' => 'Primero A',
        ]
       );
       Grade::create(
        [
            'grade_section' => 'Primero B',
        ]
       );
       Grade::create(
        [
            'grade_section' => 'Primero C',
        ]
       );
       Grade::create(
        [
            'grade_section' => 'Segundo A',
        ]
       );
       Grade::create(
        [
            'grade_section' => 'Segundo B',
        ]
       );
       Grade::create(
        [
            'grade_section' => 'Segundo C',
        ]
       );
       Grade::create(
        [
            'grade_section' => 'Tercero A',
        ]
       );
       Grade::create(
        [
            'grade_section' => 'Tercero B',
        ]
       );
       Grade::create(
        [
            'grade_section' => 'Tercero C',
        ]
       );
       Grade::create(
        [
            'grade_section' => 'Cuarto A',
        ]
       );
       Grade::create(
        [
            'grade_section' => 'Cuarto B',
        ]
       );
       Grade::create(
        [
            'grade_section' => 'Cuarto C',
        ]
       );
    }
}
