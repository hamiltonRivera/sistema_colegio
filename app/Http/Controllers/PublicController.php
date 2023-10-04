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

    public function viewEvaluationsOnly()
    {
        $user = Auth::user();

        if ($user->hasAnyRole(['Docente', 'Docente_coordinador', 'Estudiante', 'Rector-Dirección', 'Desarrollador'])) {
            if ($user->hasRole('Estudiante')) {
                $student = $user->student;
                $evaluations = $student->evaluations()->with('course')->paginate(6);

                return view('publico.student_evaluation', compact('evaluations'));
            } else {
                $studentsWithEvaluations = User::whereHas('roles', function ($query) {
                    $query->whereIn('name', ['Estudiante']);
                })->with(['student' => function ($query) {
                    $query->with(['evaluations.course', 'user']);
                }])->paginate(6);

                return view('publico.students_evaluations', compact('studentsWithEvaluations'));
            }
        } else {
            return redirect()->route('error.page')->with('error', 'No tienes permiso para acceder a esta página.');
        }
    }

    public function

}
