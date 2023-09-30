<div class="mr-2">
  <div class="mb-3">
    <label for="">Nombre del docente</label>
    <input type="text" name="name" id="name" wire:model="name" placeholder="nombre del docente:" required class="inputs-formularios-cortos">
  </div>

  {{-- @error('name')
  <p class=" text-red-600 p-2 rounded">{{ $message }}</p>
  @enderror --}}


  <div class="mb-3">
   <label for="">Inss (Opcional)</label>
   <input type="text" name="inss" id="inss" wire:model="inss" wire:input="formatInss" placeholder="Inss:" class="inputs-formularios-cortos">
  </div>

  {{-- @error('inss')
  <p class=" text-red-600 p-2 rounded">{{ $message }}</p>
  @enderror --}}

  <div class="mb-3">
    <label for="">Correo del docente</label>
    <input type="email" name="email" id="email" wire:model="email" placeholder="correo del docente:" required class="block
    md:w-52
    sm:w-80
    px-3
    py-1.5
    text-base
    font-normal
    text-gray-700
    bg-white bg-clip-padding
    border border-solid border-gray-300
    rounded
    transition
    ease-in-out
    m-0
    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
  </div>

  {{-- @error('email')
  <p class=" text-red-600 p-2 rounded">{{ $message }}</p>
  @enderror --}}
</div>
