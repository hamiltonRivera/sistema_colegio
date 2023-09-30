<div>
  <div class="mb-3">
    <label for="">Grado y sección</label>
    <input type="text" name="grade_section" id="grade_section" class="inputs-formularios-cortos" wire:model="grade_section" wire:input="formatGrade" placeholder="Grado y sección:" required maxlength="2">
    <p class=" text-red-600 p-2 rounded">*Digitar grado en numero y sección en letra</p>
  </div>


  <div class="mb-3">
    @if ($selected_id)
    <button type="button" class="boton-actualizar" wire:click="update()"><i class="fas fa-pen"></i> Actualizar</button>
    @else
    <button type="button" class="boton-guardar" wire:click="store()"><i class="fas fa-save"></i> Registrar</button>
    @endif
</div>

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
