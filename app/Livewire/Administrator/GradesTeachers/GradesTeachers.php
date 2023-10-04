<?php

namespace App\Livewire\Administrator\GradesTeachers;

use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;
use App\Models\Grade;
use App\Models\GradeTeacher;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;

class GradesTeachers extends Component
{

    use WithPagination;
    use WithFileUploads;


    protected $paginationTheme = 'tailwind';
    #[Rule('file|max:2048')] // 2MB Max

    public $user_id, $grade_id, $selected_id;

    public $search = '', $search_teacher = '', $search_grade = '';

    public function render()
    {
        $docenteCoordinadorRoleId = Role::where('name', 'Docente_coordinador')->value('id');

        $docenteCoordinadorUsers = User::whereHas('roles', function ($query) use ($docenteCoordinadorRoleId) {
            $query->where('role_id', $docenteCoordinadorRoleId);
        });

        if ($this->search_teacher) {
            $docenteCoordinadorUsers->where('name', 'like', '%' . $this->search_teacher . '%');
        }

        $docenteCoordinadorUsers = $docenteCoordinadorUsers->get();

        $aulas = Grade::orderBy('id', 'asc')
            ->where('grade_section', 'like', '%' . $this->search_grade . '%')->get();

        $registros = GradeTeacher::with('grade', 'user')
        ->orderBy('id', 'asc')
        ->whereRelation('grade', 'grade_section', 'like', '%' . $this->search . '%')
        ->orWhereRelation('user','name', 'like', '%' . $this->search . '%')->paginate(6);
        return view('livewire.administrator.grades-teachers.grades-teachers', compact('docenteCoordinadorUsers', 'aulas', 'registros'));
    }

    public function refresh()
    {
        return redirect('/private/admin/grade_teacher');
    }

    public function store()
    {
        $this->validate([
            'user_id' => 'required',
            'grade_id' => 'required'
        ]);

        // Obtén el docente asociado al usuario
        $teacher = User::find($this->user_id)->teacher;

        // Verifica si el docente está inactivo
        if ($teacher && $teacher->status === 'Retirado') {
            // El docente está inactivo, muestra un mensaje flash y no guarda el registro
            session()->flash('mensaje', 'El docente está retirado.');
            return false;
        }

        // El docente está activo o no tiene asignado un estado, procede a guardar la asignación
        $registro = new GradeTeacher();
        $registro->user_id = $this->user_id;
        $registro->grade_id = $this->grade_id;
        $registro->save();
        Alert::success('Aula - Docente guía', 'Asignación realizada exitosamente');
        $this->refresh();
    }

    public function edit($id)
    {
        $record = GradeTeacher::findOrFail($id);
        $this->selected_id = $id;
        $this->user_id = $record->user_id;
        $this->grade_id = $record->grade_id;
    }

    public function update()
    {
    }
}
