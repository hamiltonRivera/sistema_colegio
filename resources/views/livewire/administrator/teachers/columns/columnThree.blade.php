<div class="mr-2">
    <div class="mb-3">
        <label for="">Cedula</label>
        <input type="text" name="cedula" id="cedula" wire:model="cedula" wire:input="formatCedula" placeholder="Cédula:" required class="inputs-formularios-cortos" maxlength="16">
      </div>



  <div class="mb-3">
    @if ($selected_id)
    <button type="button" class="boton-actualizar" wire:click="update()"><i class="fas fa-pen"></i> Actualizar</button>
    @else
    <button type="button" class="boton-guardar" wire:click="store()"><i class="fas fa-save"></i> Registrar</button>
    @endif
    <button type="button" class="boton-guardar" wire:click="generarUsuario()"><i class="fas fa-keyboard"></i> Revisar Usuario</button>
</div>
   <div class="mb-3">
    <label for="">Usuario de sistema</label>
    <input type="text" name="user_name" wire:model="user_name" placeholder="Usuario de sistema" class="inputs-formularios-cortos-email">
  </div>

  @if (session()->has('message'))
    <div class="alert alert-warning">
        <i class="fas fa-search"></i>  {{ session('message') }}
    </div>
@endif

@if (session()->has('vacio'))
<div class="alert alert-danger">
    <i class="fas fa-window-close"></i>  {{ session('vacio') }}
</div>
@endif


</div>
