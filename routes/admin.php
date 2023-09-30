<?php
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::controller(AdminController::class)->group(function(){
   Route::group(['middleware' => ['can:ver_usuarios']], function(){
     Route::get('users', 'users')->name('users');
   });

   Route::group(['middleware' => ['can:ver_asignaturas']], function(){
    Route::get('courses', 'courses')->name('courses');

    Route::group(['middleware' => ['can:ver_Materia_docente']], function(){
      Route::get('courses_teachers', 'courses_teachers')->name('courses_teachers');
    });

    Route::group(['middleware' => ['can:Ver_grados']], function(){
        Route::get('grades', 'grades')->name('grades');
      });
    Route::group(['middleware' => ['can:ver_docente']], function(){
        Route::get('teachers', 'teachers')->name('teachers');
      });

      Route::group(['middleware' => ['can:ver_estudiante']], function(){
        Route::get('students', 'students')->name('students');
      });
   });
});
