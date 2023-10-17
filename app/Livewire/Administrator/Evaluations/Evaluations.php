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
    public $search = '', $student_id, $teacher_id, $course_id, $date, $evaluation, $description, $selected_id;

    public function render()
    {
        return view('livewire.administrator.evaluations.evaluations');
    }

    public function refresh()
    {
        return redirect('/private/admin/evaluations');
    }

    public function store()
    {

    }

    public function edit($id)
    {

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
