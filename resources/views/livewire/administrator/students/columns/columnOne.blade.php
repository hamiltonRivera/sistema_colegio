<div class="mr-2">
  <div class="mb-3">
    <label for="">Nombre del estudiante</label>
     <input type="text" name="name" wire:model="name" id="name" placeholder="Nombre de estudiante:" class="inputs-formularios-cortos" required>
  </div>

  @error('name')
  <p class=" text-red-600 p-2 rounded">{{ $message }}</p>
  @enderror


  <div class="mb-3">
    <label for="">Fecha de nacimiento</label>
    <input wire:model.lazy="birth_date" wire:change="calcularEdad" type="date" name="birth_date" class="form-control calendario" min="2021-01-01" max="2030-12-31">
  </div>

  @error('birth_date')
  <p class=" text-red-600 p-2 rounded">{{ $message }}</p>
  @enderror



 <div class="mb-3">
    <label for="">Estado</label>
    <select name="status" wire:model="status" class="select-formularios form-select"
        aria-label="Default select example">
        <option selected>Selecciona una opción</option>
        @foreach ($estados as $estado)
            <option value="{{ $estado }}">{{ $estado }}</option>
        @endforeach
    </select>
 </div>

 @error('status')
  <p class=" text-red-600 p-2 rounded">{{ $message }}</p>
  @enderror

    <div class="mb-3">
        <button class="px-6
        py-2.5
        bg-green-600
        text-white
        font-medium
        text-xs
        leading-tight
        uppercase
        rounded
        shadow-md
        hover:bg-green-700 hover:shadow-lg
        focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0
        active:bg-green-800 active:shadow-lg
        transition
        duration-150
        ease-in-out mb-2" wire:click="validarCodigo()"><i class="fas fa-sync-alt"></i> generar código</button>
    </div>

    <div class="mb-3">
        @if ($selected_id)
        <button type="button" class="boton-actualizar" wire:click="update()"><i class="fas fa-pen"></i> Actualizar</button>
        @else
        <button type="button" class="boton-guardar" wire:click="store()"><i class="fas fa-save"></i> Registrar datos</button>
        @endif
    </div>

</div>
