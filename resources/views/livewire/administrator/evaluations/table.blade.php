<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">#</th>
                <th scope="col" class="px-6 py-3">Estudiante</th>
                <th scope="col" class="px-6 py-3">Docente</th>
                <th scope="col" class="px-6 py-3">Materia</th>
                <th scope="col" class="px-6 py-3">Fecha</th>
                <th scope="col" class="px-6 py-3">Descripción</th>
                <th scope="col" class="px-6 py-3">Nota</th>
                <th scope="col" class="px-6 py-3">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notas as $nota)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="table-tr-td">{{ $loop->iteration }}</td>
                    <td class="table-tr-td">{{ $nota->student->name }}</td>
                    <td class="table-tr-td">{{ $nota->teacher->first_second_name }}</td>
                    <td class="table-tr-td">{{ $nota->course->name }}</td>
                    <td class="table-tr-td">{{ $nota->date }}</td>
                    <td class="table-tr-td">{{ $nota->description }}</td>
                    <td class="table-tr-td">{{ $nota->evaluation }}</td>
                    <td>
                        @if (auth()->user()->hasRole(['Docente', 'Docente_coordinador']))
                            @if (auth()->user()->id === $nota->teacher->user_id)
                                <button type="button" class="boton-editar" wire:click="edit({{ $nota->id }})">
                                    <i class="fas fa-pen"></i>
                                </button>

                                <button type="button" class="boton-eliminar" wire:click="destroy({{ $nota->id }})"
                                    onclick="confirm('¿Seguro que vas  a eliminar el registro? ')||event.stopImmediatePropagation()">
                                    <i class="fas fa-trash"></i>
                                </button>
                            @endif
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class=" flex justify-left">
        <nav aria-label="Page navigation example">
            <ul class="flex list-style-none">
                <li class="page-item disabled">
                    {{ $notas->links() }}
                </li>
            </ul>
        </nav>
    </div>
</div>
