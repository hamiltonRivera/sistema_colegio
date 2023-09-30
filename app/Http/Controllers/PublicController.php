<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class PublicController extends Controller
{
    function __construct()
    {
      $this->middleware('auth');
    }

}
