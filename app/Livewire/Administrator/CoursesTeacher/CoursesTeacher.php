<?php

namespace App\Livewire\Administrator\CoursesTeacher;

use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;
use App\Models\Teacher;
use App\Models\CourseTeacher;
Use App\Models\Course;
class CoursesTeacher extends Component
{

    use WithPagination;
    use WithFileUploads;

    #[Rule('file|max:2048')] // 2MB Max

    protected $paginationTheme = 'tailwind';
    public $search_teacher = '',$search_course = '', $search = '', $teacher_id, $course_id, $selected_id;
    public function render()
    {
        $buscador_docente = $this->search_teacher . '%';
        $buscador_materia = $this->search_course . '%';
        $buscador_materia_docente = $this->search . '%';


        $teachers = Teacher::orderBy('id', 'asc')
         ->where('first_second_name', 'like', '%' . $buscador_docente)
         ->orWhere('cedula', 'like', '%' . $buscador_docente)
         ->orWhere('phone_number', 'like', '%' . $buscador_docente)->get();

        $courses = Course::orderBy('id', 'asc')
         ->where('name', 'like', '%' . $buscador_materia)->get();

        $records = CourseTeacher::with('course', 'teacher')
        ->orderBy('id', 'asc')
        ->whereRelation('course', 'name', 'like', '%' . $buscador_materia_docente)
        ->orWhereRelation('teacher', 'first_second_name', 'like', '%' . $buscador_materia_docente)->paginate(6);

        return view('livewire.administrator.courses-teacher.courses-teacher', compact('teachers', 'courses', 'records'));
    }

    public function refresh()
    {
        return redirect('/private/admin/courses_teachers');
    }

    public function store()
    {
      $this->validate([
        'teacher_id' => 'required',
        'course_id' => 'required'
      ]);

      $record = new CourseTeacher();
      $record->teacher_id = $this->teacher_id;
      $record->course_id = $this->course_id;
      $record->save();
      Alert::success('Asignación materia - docente', 'Asignacion realizada exitosamente');
      $this->refresh();


    }

    public function edit($id)
    {
       $record = CourseTeacher::findOrFail($id);
       $this->selected_id = $id;
       $this->teacher_id = $record->teacher_id;
       $this->course_id = $record->course_id;
    }

    public function update()
    {
        $this->validate([
            'teacher_id' => 'required',
            'course_id' => 'required'
          ]);

          if( $this->selected_id){
           $record = CourseTeacher::findOrFail($this->selected_id);
           $record->update([
            'teacher_id' => $this->teacher_id,
            'course_id' => $this->course_id
           ]);

           Alert::success('Asignación materia - docente', 'Asignacion actualizada exitosamente');
           $this->refresh();
          }
    }

    public function destroy($id)
    {
        CourseTeacher::destroy($id);
        Alert::warning('Asignación materia - docente', 'Has eliminado el registro');
        $this->refresh();
    }
}
