<?php

namespace App\Livewire\Administrator\Students;

use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;
use App\Models\Student;
use Carbon\Carbon;

class Students extends Component
{
    use WithPagination;
    use WithFileUploads;

    #[Rule('file|max:2048')] // 2MB Max
    protected $paginationTheme = 'tailwind';
    public $search = '';

    //datos de estudiante
    public $name, $cod, $user_id, $tutor_id, $birth_date, $age, $status, $selected_id;
    public $user_name;
    public $estados = [
        'Activo',
        'Suspendido',
        'Retirado',
        'Graduado'
    ];

    public function render()
    {
        $buscador = $this->search . '%';
        $students = Student::orderBy('id', 'asc')
            ->where('name', 'like', '%' . $buscador)
            ->orWhere('cod', 'like', '%' . $buscador)
            ->orWhere('status', 'like', '%' . $buscador)->paginate(6);
        return view('livewire.administrator.students.students', compact('students'));
    }

    public function refresh()
    {
        return redirect('/private/admin/students');
    }

    public function calcularEdad()
    {
        $this->age = Carbon::createFromDate($this->birth_date)->age;
    }
   public function validarCodigo()
   {
    if(empty($this->cod))
    {
        $current_year = Carbon::now()->year;;

        $primer_letra_nombre = strtoupper(substr($this->name, 0, 1));

        $fecha_nacimiento_formateada = Carbon::parse($this->birth_date)->format('dmY');

        $numero_estudiante_registrados = Student::count() + 1;

        $this->cod = $current_year . "-" . $primer_letra_nombre . "-" . $fecha_nacimiento_formateada . "-" . $numero_estudiante_registrados;
        $this->user_name = $this->cod;
    }
   }

    public function store()
    {

        $this->validate([
            'name' => 'required|string',
            'cod' => 'required|unique:students,cod,except,id',
            'age' => 'required|numeric',
            'birth_date' => 'required|date',
            'status' => 'nullable'
        ]);
          $user = User::create([
            'name' => ucwords(strtolower($this->name)),
            'user_name' => $this->user_name,
            'password' => bcrypt('Colegio123@')  // Contraseña genérica
        ]);

         // Obtener el rol "Docente" usando el nombre del rol
         $estudianteRole = Role::where('name', 'Estudiante')->first();

          // Asignar el rol de docente al usuario
          $user->assignRole($estudianteRole);

          $estudiante = new Student();
            //validar que nada vaya vacio
        if (empty($estudiante)) {
            session()->flash('vacio', 'No has ingresado ningún usuario o ningún dato del formulario.');
            return false;
        } else {
          $estudiante->name = ucfirst(strtolower($this->name));
          $estudiante->user_id = $user->id;
          $estudiante->status = "Activo";
          $estudiante->birth_date = $this->birth_date;
          $estudiante->age = $this->age;
          $estudiante->cod = $this->cod;
          $estudiante->save();
        }


          Alert::success('Estudiante', 'Estudiante registrado exitosamente');
          $this->refresh();

    }

    public function edit($id)
    {
        $record = Student::findOrFail($id);
        $this->selected_id = $id;
        $this->name = $record->name;
        $this->cod = $record->cod;
        $this->birth_date = $record->birth_date;
        $this->age = $record->age;
    }

    public function update()
    {
    }

    public function destroy($id)
    {
        Student::destroy($id);
        Alert::warning('Estudiante', 'Has eliminado el registro');
        $this->refresh();
    }

}
