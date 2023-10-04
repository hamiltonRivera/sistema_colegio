<?php

namespace App\Livewire\Administrator\GradeStudents;

use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;
use App\Models\Grade;
use App\Models\Student;
use App\Models\GradeStudent;

class GradeStudents extends Component
{

    use WithPagination;
    use WithFileUploads;


    protected $paginationTheme = 'tailwind';
    #[Rule('file|max:2048')] // 2MB Max

    public $student_id, $grade_id, $selected_id, $search = '', $search_student = '', $search_grade = '';
    public function render()
    {
        $grados = Grade::orderBy('id', 'asc')
            ->where('grade_section', 'like', '%' . $this->search_grade . '%')->get();

        $students = Student::orderBy('id', 'asc')
            ->where('name', 'like', '%' . $this->search_student . '%')->get();

        $registros = GradeStudent::with('student', 'grade')
            ->orderBy('id', 'asc')
            ->whereRelation('student', 'name', 'like', '%' . $this->search . '%')
            ->orWhereRelation('grade', 'grade_section', 'like', '%' . $this->search . '%')->paginate(6);
        return view('livewire.administrator.grade-students.grade-students', compact('grados', 'students', 'registros'));
    }

    public function refresh()
    {
        return redirect('/private/admin/grade_students');
    }

    public function asignarEstudiantes()
    {
        $students = Student::all();
        $grades = Grade::all();

        foreach ($students as $student) {
            // Verificar si el estudiante ya está asignado a un aula
            if (GradeStudent::where('student_id', $student->id)->exists()) {
                session()->flash('warning', 'El/la estudiante o estudiantes ingresados ya están asignados');
                continue;  // Omitir este estudiante y pasar al siguiente
            } else {
                // Si no está asignado, asignar aleatoriamente a un aula
                $grade = $grades->random();
                $gradeStudent = new GradeStudent();
                $gradeStudent->student_id = $student->id;
                $gradeStudent->grade_id = $grade->id;
                $gradeStudent->save();
                Alert::success('Asignación', 'Asignación masiva realizada exitosamente');
                $this->refresh();
            }
        }
    }

    public function asignarEstudiante()
    {
        $this->validate([
            'student_id' => 'required',
            'grade_id' => 'required'
        ]);

        // Verificar si el estudiante ya está asignado a un aula
        $existingAssignment = GradeStudent::where('student_id', $this->student_id)->exists();

        if (!$existingAssignment) {
            $record = new GradeStudent();
            $record->student_id = $this->student_id;
            $record->grade_id = $this->grade_id;
            $record->save();
            Alert::success('Aula - Estudiante', 'Asignación individual realizada exitosamente');
        } else {
            session()->flash('mensaje', 'Estudiante ya asignado.');
            return false;
        }

        $this->refresh();
    }

    public function edit($id)
    {
        $record = GradeStudent::findOrFail($id);
        $this->selected_id = $id;
        $this->student_id = $record->student_id;
        $this->grade_id = $record->grade_id;
    }

    public function update()
    {
    }

    public function destroy($id)
    {
        GradeStudent::destroy($id);
        Alert::warning('Aula - Estudiante', 'Has eliminado el registro');
        $this->refresh();
    }
}
