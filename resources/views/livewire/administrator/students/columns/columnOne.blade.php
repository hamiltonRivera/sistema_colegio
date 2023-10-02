<div class="mr-2">
    <div class="mb-3">
        <label for="">Nombre del estudiante</label>
         <input type="text" name="name" wire:model="name" id="name" placeholder="Nombre de estudiante:" class="inputs-formularios-cortos" required>
      </div>


      {{-- @error('name')
  <p class=" text-red-600 p-2 rounded">{{ $message }}</p>
  @enderror --}}

  <div class="mb-3">
    <label for="">Fecha de nacimiento</label>
    <input wire:model.lazy="birth_date" wire:change="calcularEdad" type="date" name="birth_date" class="inputs-formularios-cortos" min="2021-01-01" max="2030-12-31">
  </div>

  {{-- @error('birth_date')
  <p class=" text-red-600 p-2 rounded">{{ $message }}</p>
  @enderror --}}

</div>
