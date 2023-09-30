<div class="mr-2">
  <div class="mb-3">
     <label for="">Nombre del tutor</label>
     <input type="text" name="name_tutor" id="name_tutor" wire:model="name_tutor" placeholder="Nombre del tutor:" class="inputs-formularios-cortos" required>
  </div>

 @error('name_tutor')
  <p class=" text-red-600 p-2 rounded">{{ $message }}</p>
  @enderror

  <div class="mb-3">
    <label for="">Correo</label>
    <input type="email" name="email_tutor" id="email_tutor" wire:model="email_tutor" placeholder="Correo:" class="inputs-formularios-cortos-email" required>
  </div>

  @error('email_tutor')
  <p class=" text-red-600 p-2 rounded">{{ $message }}</p>
  @enderror

</div>
