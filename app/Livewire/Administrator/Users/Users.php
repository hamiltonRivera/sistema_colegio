<?php

namespace App\Livewire\Administrator\Users;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;
class Users extends Component
{

    use WithPagination;
    use WithFileUploads;
    public $selectedRole = [];
    public $search = '';
    #[Rule('file|max:2048')] // 1MB Max
    public $file;


   public function mount()
   {
     // Inicializar $selectedRole con un array vacío para cada usuario
     $this->selectedRole = array_fill_keys(User::pluck('id')->toArray(), '');
   }


    public function render()
    {
        $users = User::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orWhere('user_name', 'like', '%' . $this->search . '%')->paginate(6);

        return view('livewire.administrator.users.users', [
            'users' => $users,
            'roles' => Role::all()
        ]);
    }

    public function refrescar()
    {
      return redirect('/private/admin/users');
    }

    public function assignRoles()
    {
        foreach ($this->selectedRole as $userId => $roleName) {
            $user = User::find($userId);

            if ($user && $roleName) {
                $user->syncRoles([$roleName]);
            }
        }

       Alert::success('Usuarios', 'Usuario actualizado');
       $this->refrescar();
    }

    public function import()

    {
        $this->file->store('subida_archivos', 'public');
        Excel::import(new UsersImport, $this->file);
        Alert::success('Carga', 'Carga de archivo exitosa');
        $this->refrescar();
    }



}
