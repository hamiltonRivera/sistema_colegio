<?php
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::controller(PublicController::class)->group(function(){
  Route::group(['middleware' => ['can:ver_evaluacion']], function(){
    Route::get('viewEvaluation/{student_id}', 'viewEvaluation')->name('viewEvaluation');
  });
});
