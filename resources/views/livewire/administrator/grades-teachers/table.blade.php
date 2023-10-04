<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
              <th scope="col" class="px-6 py-3">
                  #
              </th>
              <th scope="col" class="px-6 py-3">
                  Docente
              </th>
              <th scope="col" class="px-6 py-3">
                  Aula
              </th>
              <th scope="col" class="px-6 py-3">
                  Opciones
              </th>
         </tr>
      </thead>

      <tbody>
          @foreach ($registros as $registro)
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
              <td class="table-tr-td">{{ $loop->iteration }}</td>
              <td class="table-tr-td">{{ $registro->user->name }}</td>
              <td class="table-tr-td">{{ $registro->grade->grade_section }}</td>
              <td>
                  @can('editar_grado_docente_guia')
                  <button type="button" class="boton-editar" wire:click="edit({{ $registro->id }})">
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
                {{ $registros->links() }}
              </li>
            </ul>
          </nav>
        </div>
  </div>
