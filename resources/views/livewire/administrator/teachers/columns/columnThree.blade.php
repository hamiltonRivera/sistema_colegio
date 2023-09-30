<div class="mr-2 mt-4">
    <div class="mb-3">
        @if ($selected_id)
        <button type="button" class="boton-actualizar" wire:click="update()"><i class="fas fa-pen"></i> Actualizar</button>
        @else
        <button type="button" class="boton-guardar" wire:click="store()"><i class="fas fa-save"></i> Registrar</button>
        @endif
    </div>
</div>
