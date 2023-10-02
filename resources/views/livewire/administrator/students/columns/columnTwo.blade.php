<div class="mr-2">
    <div class="mb-3">
        <label for="">Edad</label>
        <input type="number" class="inputs-formularios-cortos" placeholder="Edad:" name="age" id="age"
            wire:model="age" wire:change="calcularEdad" required disabled>
    </div>

    {{-- @error('age')
      <p class=" text-red-600 p-2 rounded">{{ $message }}</p>
      @enderror --}}

    <div class="mb-3">
        <label for="">Código del estudiante</label>
        <input type="text" name="cod" id="cod" wire:model="cod" placeholder="Código:"
            class="inputs-formularios-cortos" required disabled>
    </div>

    @if ($selected_id)
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

        {{-- @error('status')
  <p class=" text-red-600 p-2 rounded">{{ $message }}</p>
  @enderror --}}
    @endif

</div>
