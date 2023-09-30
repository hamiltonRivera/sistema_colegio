<div>
  <div class="mr-2">

    <div class="mb-3">
      <label for="">Nombre de la materia</label>
       <input type="text" class="inputs-formularios-cortos" name="name" wire:model="name" id="name" placeholder="Nombre de la materia:" required>
    </div>

    @error('name')
    <p class=" text-red-600 p-2 rounded">{{ $message }}</p>
    @enderror

    <div class="flex">
       <div>
        <div class="mb-3">
            @if ($selected_id)
            <button type="button" class="boton-actualizar" wire:click="update()"><i class="fas fa-pen"></i> Actualizar</button>
            @else
            <button type="button" class="boton-guardar" wire:click="store()"><i class="fas fa-save"></i> Registrar</button>
            @endif
        </div>
       </div>

       <div>
         @include('livewire.administrator.courses.fileUpload')
       </div>
    </div>


  </div>
</div>
