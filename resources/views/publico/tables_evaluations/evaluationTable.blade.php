<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">#</th>
                <th scope="col" class="px-6 py-3">Materia</th>
                <th scope="col" class="px-6 py-3">Fecha</th>
                <th scope="col" class="px-6 py-3">Nota</th>
                <th scope="col" class="px-6 py-3">Descripción</th>
           </tr>
        </thead>
        <tbody>
            @foreach ($evaluaciones as $evaluation)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="table-tr-td">{{ $loop->iteration }}</td>
                <td class="table-tr-td">{{ $evaluation->course->name }}</td>
                <td class="table-tr-td">{{ $evaluation->date }}</td>
                <td class="table-tr-td">{{ $evaluation->evaluation }}</td>
                <td class="table-tr-td">{{ $evaluation->description }}</td>


            </tr>
            @endforeach
        </tbody>
    </table>
    <div class=" flex justify-left">
        <nav aria-label="Page navigation example">
          <ul class="flex list-style-none">
            <li class="page-item disabled">
              {{-- {{ $notas->links() }} --}}
            </li>
          </ul>
        </nav>
      </div>
</div>
