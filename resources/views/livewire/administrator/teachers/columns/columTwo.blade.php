<div class="mr-2">
    <div class="mb-3">
        <label for="">Cedula</label>
        <input type="text" name="cedula" id="cedula" wire:model="cedula" wire:input="formatCedula" placeholder="Cédula:" required class="inputs-formularios-cortos" maxlength="16">
      </div>

      {{-- @error('cedula')
  <p class=" text-red-600 p-2 rounded">{{ $message }}</p>
  @enderror --}}

    <div class="mb-2">
      <label for="">Teléfono</label>
      <input type="text" name="phone_number" wire:model="phone_number" wire:input="formatPhoneNumber" id="phone_number" placeholder="Teléfono:" required class="inputs-formularios-cortos">
    </div>

    {{-- @error('phone_number')
  <p class=" text-red-600 p-2 rounded">{{ $message }}</p>
  @enderror --}}

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
