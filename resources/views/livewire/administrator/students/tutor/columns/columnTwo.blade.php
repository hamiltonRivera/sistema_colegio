<div class="mr-2">
  <div class="mb-3">
    <label for="">Teléfono</label>
    <input type="text" wire:model.live="phone_number" placeholder="Teléfono:" class="inputs-formularios-cortos" required maxlength="9">
  </div>

  @error('phone_number')
  <p class=" text-red-600 p-2 rounded">{{ $message }}</p>
  @enderror
</div>
