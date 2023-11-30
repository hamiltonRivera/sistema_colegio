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
            'shift' => 'Matutino',
        ]
       );

       Grade::create(
        [
            'grade_section' => 'Primero A',
            'shift' => 'Vespertino',
        ]
       );

       Grade::create(
        [
            'grade_section' => 'Primero B',
            'shift' => 'Matutino',
        ]
       );
       Grade::create(
        [
            'grade_section' => 'Primero C',
            'shift' => 'Vespertino',
        ]
       );
       Grade::create(
        [
            'grade_section' => 'Segundo A',
            'shift' => 'Matutino',
        ]
       );
       Grade::create(
        [
            'grade_section' => 'Segundo B',
            'shift' => 'Vespertino',
        ]
       );
       Grade::create(
        [
            'grade_section' => 'Segundo C',
            'shift' => 'Matutino',
        ]
       );
       Grade::create(
        [
            'grade_section' => 'Tercero A',
            'shift' => 'Vespertino',
        ]
       );
       Grade::create(
        [
            'grade_section' => 'Tercero B',
            'shift' => 'Matutino',
        ]
       );
       Grade::create(
        [
            'grade_section' => 'Tercero C',
            'shift' => 'Vespertino',
        ]
       );
       Grade::create(
        [
            'grade_section' => 'Cuarto A',
            'shift' => 'Matutino',
        ]
       );
       Grade::create(
        [
            'grade_section' => 'Cuarto B',
            'shift' => 'Vespertino',
        ]
       );
       Grade::create(
        [
            'grade_section' => 'Cuarto C',
            'shift' => 'Matutino',
        ]
       );
    }
}
