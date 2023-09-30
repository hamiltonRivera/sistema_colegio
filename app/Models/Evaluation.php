<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'course_id',
        'date',
        'evaluation',
        'description'
    ];

    public function studiant()
    {
        return $this->belongsTo(Student::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function calcularNotaFinal()
    {
        $acumulate = 0;

        // Obtener todas las evaluaciones del estudiante para la asignatura actual
        $evaluations = Evaluation::where('student_id', $this->student_id)
                                 ->where('course_id', $this->course_id)->get();

        // Sumar las notas de las evaluaciones
        foreach ($evaluations as $evaluation) {
            $acumulate += $evaluation->nota;
        }

        // Retornar el acumulado
        return $acumulate;
    }
}
