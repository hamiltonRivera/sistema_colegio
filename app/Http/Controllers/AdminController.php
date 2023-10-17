<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
class AdminController extends Controller
{
    function __construct()
    {
      $this->middleware('auth');
    }

    public function users()
    {

        return view('administrator.users');
    }

    public function courses()
    {
        return view('administrator.materias');
    }

    public function courses_teachers()
    {
        return view('administrator.courses_teachers');
    }

    public function grades()
    {
        return view('administrator.sections');
    }

    public function students()
    {
        return view('administrator.students');
    }

    public function teachers()
    {
        return view('administrator.teachers');
    }

    public function grade_students()
    {
        return view('administrator.grades_students');
    }

    public function grade_teacher()
    {
        return view('administrator.grades_coord_teachers');
    }

    public function evaluations()
    {
        return view('administrator.evaluations');
    }

}
