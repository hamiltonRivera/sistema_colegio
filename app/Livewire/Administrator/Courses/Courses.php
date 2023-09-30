<?php

namespace App\Livewire\Administrator\Courses;

use Livewire\Component;
use App\Models\Course;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;
use App\Imports\CourseImport;
use Maatwebsite\Excel\Facades\Excel;
class Courses extends Component
{

    use WithPagination;
    use WithFileUploads;

    #[Rule('file|max:2048')] // 2MB Max

    public $search = '', $name, $selected_id, $file;
    protected $paginationTheme = 'tailwind';

    public function render()
    {
        $courses = Course::orderBy('id', 'asc')
         ->where('name', 'like', '%' . $this->search . '%')->paginate(6);
        return view('livewire..administrator.courses.courses', compact('courses'));
    }

    public function refresh()
    {
       return redirect('/private/admin/courses');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|unique:courses,name,except,id',
           ]);

       $course = new Course();
       $course->name = ucwords(strtolower($this->name));
       $course->save();
       Alert::success('Materia', 'Materia registrada exitosamente');
       $this->refresh();
    }

    public function edit($id)
    {
      $record = Course::findOrFail($id);
      $this->selected_id = $id;
      $this->name = $record->name;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string'
        ]);

        if($this->selected_id)
        {
           $record = Course::findOrFail($this->selected_id);
           $record->update([
            'name' => ucwords(strtolower($this->name))
           ]);

           Alert::success('Materia', 'Materia actualizada exitosamente');
           $this->refresh();
        }
    }

    public function destroy($id)
    {
       Course::destroy($id);
       Alert::warning('Materia', 'Has eliminado el registro');
       $this->refresh();
    }

    public function import()
    {
        $this->file->store('subida_archivos', 'public');
        Excel::import(new CourseImport, $this->file);
        Alert::success('Carga', 'Carga de archivo exitosa');
        $this->refresh();
    }
}
