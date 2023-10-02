
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">#</th>
                <th scope="col" class="px-6 py-3">Nombre</th>
                <th scope="col" class="px-6 py-3">Correo</th>
                <th scope="col" class="px-6 py-3">Cedula</th>
                <th scope="col" class="px-6 py-3">Inss</th>
                <th scope="col" class="px-6 py-3">Teléfono</th>
                <th scope="col" class="px-6 py-3">Estado</th>
                <th scope="col" class="px-6 py-3">Opciones</th>
           </tr>
        </thead>
        <tbody>
            @foreach ($teachers as $teacher)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="table-tr-td">{{ $loop->iteration }}</td>
                <td class="table-tr-td">{{ $teacher->first_second_name }}{{ $teacher->first_second_last_name }}</td>
                <td class="table-tr-td">{{ $teacher->email }}</td>
                <td class="table-tr-td"> @can('ver_datos_sensibles-docentes'){{ $teacher->cedula }}@endcan</td>
                <td class="table-tr-td">@can('ver_datos_sensibles-docentes'){{ $teacher->inss }}@endcan</td>
                <td class="table-tr-td">{{ $teacher->phone_number }}</td>
                <td class="table-tr-td">{{ $teacher->status }}</td>
                <td>
                    @can('editar_docente')
                    <button type="button" class="boton-editar" wire:click="edit({{ $teacher->id }})">
                        <i class="fas fa-pen"></i>
                    </button>
                    @endcan

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class=" flex justify-left">
        <nav aria-label="Page navigation example">
          <ul class="flex list-style-none">
            <li class="page-item disabled">
              {{ $teachers->links() }}
            </li>
          </ul>
        </nav>
      </div>
</div>
