
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">#</th>
                <th scope="col" class="px-6 py-3">Año - Seccion</th>
                <th scope="col" class="px-6 py-3">Opciones</th>
           </tr>
        </thead>
        <tbody>
            @foreach ($records as $record)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="table-tr-td">{{ $loop->iteration }}</td>
                <td class="table-tr-td">{{ $record->grade_section }}</td>
                <td>
                    <button type="button" class="boton-editar" wire:click="edit({{ $record->id }})">
                        <i class="fas fa-pen"></i>
                    </button>

                    <button type="button" class="boton-eliminar" wire:click="destroy({{ $record->id }})" onclick="confirm('¿Seguro que vas  a eliminar el registro? ')||event.stopImmediatePropagation()">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    <div class=" flex justify-left">
        <nav aria-label="Page navigation example">
          <ul class="flex list-style-none">
            <li class="page-item disabled">
              {{ $records->links() }}
            </li>
          </ul>
        </nav>
      </div>
</div>
