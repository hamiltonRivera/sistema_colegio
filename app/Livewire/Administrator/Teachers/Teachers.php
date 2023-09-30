<?php

namespace App\Livewire\Administrator\Teachers;

use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;
use App\Models\Teacher;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class Teachers extends Component
{

    use WithPagination;
    use WithFileUploads;

    #[Rule('file|max:2048')] // 2MB Max

    public $search = '', $name, $cedula, $inss, $phone_number, $email, $user_id, $selected_id, $file, $status;
    protected $paginationTheme = 'tailwind';

    public $estados = [
        'Activo',
        'Subcidio',
        'Vacaciones',
        'Retirado'
    ];

    public function render()
    {
        $buscador = $this->search . '%';
        $teachers = Teacher::orderBy('id', 'asc')
            ->where('name', 'like', '%' . $buscador)
            ->orWhere('cedula', 'like', '%' . $buscador)
            ->orWhere('inss', 'like', '%' . $buscador)
            ->orWhere('phone_number', 'like', '%' . $buscador)
            ->orWhere('email', 'like', '%' . $buscador)
            ->orWhere('status', 'like', '%' . $buscador)->paginate(6);
        return view('livewire.administrator.teachers.teachers', compact('teachers'));
    }

    public function  refresh()
    {
        return redirect('/private/admin/teachers');
    }

    //agrega guiones a numero de telefono
    public function formatPhoneNumber()
    {
        if (Str::length($this->phone_number) == 4) {
            $this->phone_number = $this->phone_number . '-';
        }
    }

    //agrega guiones a numero de cedula
    public function formatCedula()
    {
        if(Str::length($this->cedula) === 3 ) {
            $this->cedula = $this->cedula . '-';
        }

        if(Str::length($this->cedula) === 10){
            $this->cedula = $this->cedula . '-';
        }

        if(Str::length($this->cedula) === 16){
            // Obtén el último carácter y conviértelo a mayúsculas
            $lastChar = strtoupper(substr($this->cedula, -1));
        $this->cedula = substr($this->cedula, 0, 16 - 1) . $lastChar;
        }
    }

    public function formatInss()
    {
        if(Str::length($this->inss) === 7){
            $this->inss = $this->inss . '-';
        }
    }

    public function store()
    {
        //validaciones de los campos de docente
        $this->validate([
            'name' => 'required|string',
            'cedula' => 'required|string|unique:teachers,cedula|max:16',
            'inss' => 'required|string|unique:teachers,inss',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|string|unique:teachers,phone_number|max:9',
            'status' => 'nullable|string'
        ]);

        //creación del usuario
        $user = User::create([
            'name' => ucwords(strtolower($this->name)),
            'email' => strtolower($this->email),
            'password' => bcrypt('Contraseña123@'),  // Contraseña genérica
        ]);

        // Obtener el rol "Docente" usando el nombre del rol
        $docenteRole = Role::where('name', 'Docente')->first();

        // Asignar el rol de docente al usuario
        $user->assignRole($docenteRole);

        // Crear el docente relacionado con el usuario
         $teacher = new Teacher();
         $teacher->name = ucwords(strtolower($this->name));
         $teacher->cedula = $this->cedula;
         $teacher->inss = $this->inss;
         $teacher->email = $this->email;
         $teacher->phone_number = $this->phone_number;
         $teacher->status = $this->status = "Activo";
         $teacher->user_id = $user->id;
         $teacher->save();

        Alert::success('Docente', 'Docente registrado exitosamente');
        $this->refresh();
    }

    public function edit($id)
    {
        $record = Teacher::findOrFail($id);
        $this->selected_id = $id;
        $this->name = $record->name;
        $this->cedula = $record->cedula;
        $this->inss = $record->inss;
        $this->email = $record->email;
        $this->phone_number = $record->phone_number;
        $this->status = $record->status;
    }


   public function update()
   {
      // Validaciones
    //validaciones de los campos de docente
    $this->validate([
        'name' => 'required|string',
        'cedula' => 'required|string|max:16',
        'inss' => 'required|string',
        'email' => 'required',
        'phone_number' => 'required',
        'status' => 'nullable|string'
    ]);

    if ($this->selected_id) {
        // Encontrar el docente
        $teacher = Teacher::findOrFail($this->selected_id);

        // Actualizar datos del docente
        $teacher->update([
            'name' => ucwords(strtolower($this->name)),
            'email' => strtolower($this->email),
            'phone_number' => $this->phone_number,
            'status' => $this->status,
            'cedula' => $this->cedula,
            'inss' => $this->inss
        ]);

        // También actualizamos el usuario relacionado
        $user = User::findOrFail($teacher->user_id);
        $user->update([
            'name' => ucwords(strtolower($this->name)),
            'email' => strtolower($this->email),
        ]);

        Alert::success('Docente', 'Docente actualizado exitosamente');
        $this->refresh();
    }
   }


}
