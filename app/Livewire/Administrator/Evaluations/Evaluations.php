<?php

namespace App\Livewire\Administrator\Evaluations;

use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Evaluation;
use Livewire\WithPagination;
class Evaluations extends Component
{

    protected $paginationTheme = 'tailwind';
    public $search = '', $search_student = '', $search_teacher = '', $search_course = '',
     $student_id, $teacher_id, $course_id, $date, $materias,
     $evaluation, $description,$selected_id;

    public $courses = [], $teachers;

    public function mount()
    {


        if (auth()->user()->hasRole(['Docente', 'Docente_coordinador'])) {
            $this->materias = Course::whereHas('teachers', function($query){
                       return $query->where('teachers.id', auth()->user()->teacher->id);
                      })->get();
        } 
    }

    public function render()
    {
        $students = Student::orderBy('id', 'asc')
         ->where('name', 'like', '%' . $this->search_student . '%')
         ->orWhere('cod', 'like', '%' . $this->search_student . '%')->get();




        $notas = Evaluation::with('student', 'teacher', 'course')
         ->whereRelation('student', 'name', 'like', '%' . $this->search . '%')
         ->orWhereRelation('teacher', 'first_second_name', 'like', '%' . $this->search . '%')
         ->orWhereRelation('course', 'name', 'like', '%' . $this->search . '%')
         ->orWhere('date', 'like', '%' . $this->search . '%')->paginate(6);

        return view('livewire.administrator.evaluations.evaluations', compact('students', 'notas'));
    }



    public function refresh()
    {
        return redirect('/private/admin/evaluations');
    }



    public function store()
    {
       $this->validate([
        'student_id' => 'required',

        'course_id' => 'required',
        'date' => 'required|date',
        'evaluation' => 'required|numeric',
        'description' => 'required|string'
       ]);

       $nota = new Evaluation();
       $nota->student_id = $this->student_id;
       $nota->teacher_id = auth()->user()->teacher->id;
       $nota->course_id = $this->course_id;
       $nota->date = $this->date;
       $nota->evaluation = $this->evaluation;
       $nota->description = ucfirst(strtolower($this->description));
       $nota->save();
       Alert::success('Evaluaciones', 'Evaluación registrada');
       $this->refresh();
    }

    public function edit($id)
    {
      $record = Evaluation::findOrFail($id);
      $this->selected_id = $id;
      $this->student_id = $record->student_id;
      $this->course_id = $record->course_id;
      $this->date = $record->date;
      $this->evaluation = $record->evaluation;
      $this->description = $record->description;
    }

    public function update()
    {

    }

    public function destroy($id)
    {
        Evaluation::destroy($id);
        $this->refresh();
        Alert::warning('Evaluaciones', 'Has eliminado el registro');
    }
}
