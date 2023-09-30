<?php

namespace App\Livewire\Administrator\Sections;

use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;
use App\Models\Grade;
use BaconQrCode\Renderer\Color\Gray;
use Illuminate\Support\Str;
class Sections extends Component
{
    use WithPagination;
    use WithFileUploads;


    protected $paginationTheme = 'tailwind';
    #[Rule('file|max:2048')] // 2MB Max

    public $grade_section, $search = '', $selected_id;


    public function render()
    {
        $records = Grade::orderBy('id', 'asc')
        ->where('grade_section', 'like', '%' . $this->search . '%')->paginate(6);
        return view('livewire.administrator.sections.sections', compact('records'));
    }

    public function refresh()
    {
        return redirect('/private/admin/grades');
    }

    public function formatGrade()
    {
        if (strlen($this->grade_section) === 2) {
            $firstChar = substr($this->grade_section, 0, 1);
            $secondChar = strtoupper(substr($this->grade_section, 1, 1));
            $this->grade_section = $firstChar . $secondChar;
        }
    }

    public function store()
    {
       $this->validate([
        'grade_section' => 'required|string|max:2|unique:grades,grade_section,except,id',
       ]);

       $record = new Grade();
       $record->grade_section = $this->grade_section;
       $record->save();
       Alert::success('Grado - Sección', 'Grado y sección registrados exitosamente');
       $this->refresh();
    }

    public function edit($id)
    {
       $record = Grade::findOrFail($id);
       $this->selected_id = $id;
       $this->grade_section = $record->grade_section;

    }

    public function update()
    {
        $this->validate([
            'grade_section' => 'required|string|max:2',
           ]);

           if($this->selected_id){
            $registro = Grade::findOrFail($this->selected_id);
            $registro->update([
                'grade_section' => $this->grade_section
            ]);

            Alert::success('Grado - Sección', 'Grado y sección actualizados exitosamente');
            $this->refresh();
           }
    }

    public function destroy($id)
    {
      Grade::destroy($id);
      Alert::warning('Grado - Sección', 'Has eliminado el registro');
      $this->refresh();
    }
}
