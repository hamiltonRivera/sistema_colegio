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

    public $search = '', $first_second_name, $first_second_last_name, $cedula, $inss, $phone_number, $email, $user_id, $selected_id, $file, $status;
    public $user_name;
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
            ->where('first_second_name', 'like', '%' . $buscador)
            ->where('first_second_last_name', 'like', '%' . $buscador)
            ->orWhere('cedula', 'like', '%' . $buscador)
            ->orWhere('inss', 'like', '%' . $buscador)
            ->orWhere('phone_number', 'like', '%' . $buscador)
            ->orWhere('email', 'like', '%' . $buscador)
            ->orWhere('status', 'like', '%' . $buscador)->paginate(5);
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
        if (Str::length($this->cedula) === 3) {
            $this->cedula = $this->cedula . '-';
        }

        if (Str::length($this->cedula) === 10) {
            $this->cedula = $this->cedula . '-';
        }

        if (Str::length($this->cedula) === 16) {
            // Obtén el último carácter y conviértelo a mayúsculas
            $lastChar = strtoupper(substr($this->cedula, -1));
            $this->cedula = substr($this->cedula, 0, 16 - 1) . $lastChar;
        }
    }

    public function formatInss()
    {
        if (Str::length($this->inss) === 7) {
            $this->inss = $this->inss . '-';
        }
    }

    public function generarUsuario()
    {
        if (empty($this->user_name)) {
            session()->flash('vacio', 'No has ingresado ningún usuario.');
            return false;
        } else {
            // Obtiene el nombre de usuario ingresado manualmente
            $usuario = strtolower($this->user_name);

            // Verifica si el usuario ya existe
            $usuarioExistente = User::where('user_name', $usuario)->exists();

            if ($usuarioExistente) {
                // Genera un número aleatorio de 10 a 99
                $numeroAleatorio = rand(10, 99);

                // Concatena dos números aleatorios al usuario existente
                $usuario .= $numeroAleatorio;

                session()->flash('message', 'El usuario ya está ocupado. Se ha generado uno nuevo automáticamente.');
            } else {
                session()->flash('message', 'El usuario está disponible.');
            }

            $this->user_name = $usuario;
        }
    }

    public function validarCorreo()
    {
        //código de validacion si el correo que se está escribiendo ya está en usu
        $correoExistente = User::where('email', $this->email)->exists();

        if($correoExistente)
        {
            session()->flash('validacion_correo', 'El correo ya está ocupado.');
        }else{
            session()->flash('validacion_correo', 'El correo está disponible.');
        }
    }

    public function store()
    {

        //validar que nombre de usuario no vaya vacio
        if (empty($this->user_name)) {
            session()->flash('vacio', 'No has ingresado ningún usuario o ningún dato del formulario.');
            return false;
        } else {
            //validaciones de los campos de docente
        $this->validate([
            'first_second_name' => 'required|string',
            'first_second_last_name' => 'required|string',
            'cedula' => 'required|string|unique:teachers,cedula|max:16',
            'inss' => 'required|string|unique:teachers,inss',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|string|unique:teachers,phone_number|max:9',
            'status' => 'nullable|string'
        ]);

        //creación del usuario
        $user = User::create([
            'name' => $this->first_second_name . ' ' . $this->first_second_last_name,
            'email' => strtolower($this->email),
            'user_name' => $this->user_name,
            'password' => bcrypt('Contraseña123@'),  // Contraseña genérica
        ]);

        // Obtener el rol "Docente" usando el nombre del rol
        $docenteRole = Role::where('name', 'Docente')->first();

        // Asignar el rol de docente al usuario
        $user->assignRole($docenteRole);

        // Crear el docente relacionado con el usuario

        /************************ */

        /****** ********/
        $teacher = new Teacher();
        $teacher->first_second_name = ucfirst(strtolower($this->first_second_name)) . ' ' ;
        $teacher->first_second_last_name = ' ' . ucfirst(strtolower($this->first_second_last_name));
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


    }

    public function edit($id)
    {
        $record = Teacher::findOrFail($id);
        $this->selected_id = $id;
        $this->first_second_name = $record->first_second_name;
        $this->first_second_last_name = $record->first_second_last_name;
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
            'first_second_name' => 'required|string',
            'first_second_last_name' => 'required|string',
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
                'first_second_name' => ucfirst(strtolower($this->first_second_name)),
                'first_second_last_name' => ucfirst(strtolower($this->first_second_last_name)),
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
