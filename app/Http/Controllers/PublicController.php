<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Evaluation;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Course;

class PublicController extends Controller
{
    function __construct()
    {
      $this->middleware('auth');
    }

    public function viewEvaluation()
    {
      // Obtener el estudiante autenticado
       $student = auth()->user()->student;
       // Verificar si el estudiante existe
    if ($student) {
        // Obtener todas las evaluaciones de este estudiante
        $evaluaciones = $student->evaluations;
      // Pasar las evaluaciones a la vista 'student_evaluation' como un arreglo
      return view('publico.student_evaluation', compact('evaluaciones') );
    }


    }







}
