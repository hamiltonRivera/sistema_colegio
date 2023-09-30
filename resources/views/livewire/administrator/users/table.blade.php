<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">#</th>
                <th scope="col" class="px-6 py-3">Nombre</th>
                <th scope="col" class="px-6 py-3">Correo</th>
                <th scope="col" class="px-6 py-3">Rol Actual</th>
                <th scope="col" class="px-6 py-3">Roles</th>
                <th scope="col" class="px-6 py-3">Opciones</th>
           </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $loop->iteration }} </td>
                    <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                    <td class="py-2 px-4 border-b">
                        @if($user->roles->isNotEmpty())
                            <div class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-1"></i>
                                {{ $user->roles->first()->name }}
                            </div>
                        @else
                            <div class="flex items-center">
                                <i class="fas fa-times text-red-500 mr-1"></i>
                                Sin Rol
                            </div>
                        @endif
                    </td>
                    <td class="py-2 px-4 border-b">
                        <div class="flex">
                            <select class="p-2 border rounded mr-2" wire:model="selectedRole.{{ $user->id }}">
                                <option value="" selected>Seleccione un rol</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td class="py-2 px-4 border-b">
                        <button class="p-2 bg-blue-500 text-white rounded hover:bg-blue-700" wire:click="assignRoles">Asignar Rol</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class=" flex justify-left">
        <nav aria-label="Page navigation example">
          <ul class="flex list-style-none">
            <li class="page-item disabled">
              {{ $users->links() }}
            </li>
          </ul>
        </nav>
      </div>
</div>
