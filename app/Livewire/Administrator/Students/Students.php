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
use App\Models\Tutor;
use Carbon\Carbon;

class Students extends Component
{
    use WithPagination;
    use WithFileUploads;

    #[Rule('file|max:2048')] // 2MB Max
    protected $paginationTheme = 'tailwind';
    public $search = '';

    //datos de estudiante
    public $name, $cod, $user_id, $tutor_id, $email, $birth_date, $age, $status;

    //datos de tutor
    public $name_tutor, $phone_number, $email_tutor, $user_id_tutor;
    public $password = "Contraseña123@", $estudiante, $tutor_user, $tutor_record,$student_record, $selected_id;

    public $estados = [
        'Activo',
        'Suspendido',
        'Retirado'
    ];

    public function render()
    {
        $buscador = $this->search . '%';
        $students = Student::with('tutor')
            ->orderBy('id', 'asc')
            ->where('name', 'like', '%' . $buscador)
            ->orWhere('cod', 'like', '%' . $buscador)
            ->orwhere('email', 'like', '%' . $buscador)
            ->orWhere('status', 'like', '%' . $buscador)
            ->orWhereRelation('tutor', 'name', '%' . $buscador)->paginate(6);
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


    }
   }

    public function store()
    {


        $this->validate([
            'name' => 'required|string',
            'cod' => 'required|unique:students,cod,except,id',
            'user_id' => 'required',
            'tutor_id' => 'required',
            'email' => 'required|email|unique:students,cod,except,id',
            'age' => 'required|numeric',
            'birth_date' => 'required|date',
            'status' => 'nullable'
        ]);

        //creando el usuario de tutor
        $tutor_user = User::create([
            'name' => ucwords(strtolower($this->name_tutor)),
            'email' => strtolower($this->email_tutor),
            'password' => bcrypt('Colegio123@')  // Contraseña genérica
        ]);

         // Obtener el rol "Docente" usando el nombre del rol
         $tutorRole = Role::where('name', 'Tutor_Inmediato')->first();

          // Asignar el rol de docente al usuario
          $tutor_user->assignRole($tutorRole);

          $estudiante_user = User::create([
            'name' => ucwords(strtolower($this->name)),
            'email' => strtolower($this->email),
            'password' => bcrypt('Colegio123@')  // Contraseña genérica
        ]);

         // Obtener el rol "Docente" usando el nombre del rol
         $estudianteRole = Role::where('name', 'Estudiante')->first();

          // Asignar el rol de docente al usuario
          $estudiante_user->assignRole($estudianteRole);

          $tutor = new Tutor();
          $tutor->name = $this->name_tutor;
          $tutor->email = $this->email_tutor;
          $tutor->phone_number = $this->phone_number;
          $tutor->user_id = $tutor_user->id;
          $tutor->save();

          $estudiante = new Student();
          $estudiante->name = ucfirst(strtolower($this->name));
          $estudiante->email = $this->email;
          $estudiante->user_id = $estudiante_user->id;
          $estudiante->tutor_id = $tutor->id;
          $estudiante->status = "Activo";
          $estudiante->birth_day = $this->birth_date;
          $estudiante->age = $this->age;
          $estudiante->save();

          Alert::success('Estudiante', 'Estudiante registrado exitosamente');
          $this->refresh();

    }

    public function edit($id)
    {
        $record = Student::findOrFail($id);
        $this->selected_id = $id;
        $this->name = $record->name;
        $this->cod = $record->cod;
        $this->tutor_id = $record->tutor->name;
        $this->email = $record->email;
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

    public function formatTutorPhoneNumber()
    {
      if(Str::length($this->phone_number) === 4)
      {
        $this->phone_number = $this->phone_number . '-';
      }
    }
}
