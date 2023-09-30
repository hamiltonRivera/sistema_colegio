<div class="mr-2">
 <div class="mb-3">
   <label for="">Correo estudiante</label>
   <input type="email" name="email" id="email" wire:model.live="email" placeholder="Correo estudiante:" class="inputs-formularios-cortos-email" required>
 </div>

 @error('email')
 <p class=" text-red-600 p-2 rounded">{{ $message }}</p>
 @enderror


 <div class="mb-3">
   <label for="">Edad</label>
   <input type="number" class="inputs-formularios-cortos" placeholder="Edad:" name="age" id="age" wire:model="age" wire:change="calcularEdad" required disabled>
 </div>

 @error('age')
 <p class=" text-red-600 p-2 rounded">{{ $message }}</p>
 @enderror


 <div class="mb-3">
  <label for="">Código estudiante</label>
   <input type="text" name="cod" id="cod" wire:model="cod" placeholder="Código:" class="inputs-formularios-cortos" required disabled>
 </div>

 @error('cod')
 <p class=" text-red-600 p-2 rounded">{{ $message }}</p>
 @enderror

</div>
