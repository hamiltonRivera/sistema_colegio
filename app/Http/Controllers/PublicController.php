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

    public function viewEvaluation($student_id)
    {
        
    }







}
