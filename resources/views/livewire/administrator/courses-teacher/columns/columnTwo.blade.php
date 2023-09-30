<div class="mr-2">
    <div class="mb-3">
        <label for="">Busqueda sensible</label>
                <input type="search" wire:model.live="search_teacher" placeholder="Búsqueda del docente"
                    class=" inputs-formularios-cortos form-control">
    </div>

    <div class="mb-3">
        <label for="">Docente</label>
        <select name="teacher_id" wire:model="teacher_id" class="select-formularios form-select"
            aria-label="Default select example">
            <option selected>Selecciona una opción</option>
            @foreach ($teachers as $teacher)
                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
            @endforeach
        </select>
    </div>
    @error('course_id')
        <p class=" text-red-600 p-2 rounded">{{ $message }}</p>
    @enderror
    {{--  --}}

    <form wire:submit="import" enctype="multipart/form-data">
        <div class="flex">
            <div>
              <input type="file" wire:model="file" class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary" required accept=".xlsx">

              <div wire:loading wire:target="file" wire:key="file"><i class="fas fa-atom"></i>Cargando</div>
              <div wire:loading wire:target="import" wire:key="import"><i class="fas fa-atom"></i>Cargando</div>
              @error('file') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="ml-2">
              <button type="submit" class="p-2 bg-purple-400 text-white rounded hover:bg-purple-700"><i class="fas fa-upload"></i> Cargar Archivo</button>
            </div>
          </div>

    </form>

</div>
