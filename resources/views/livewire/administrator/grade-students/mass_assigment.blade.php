<div class="mb-3 text-center">
    <button type="button" class="boton-guardar" wire:click="asignarEstudiantes()"><i class="fas fa-save"></i> Asignación Masiva</button>
</div>

<div class="mb-3">
    @if (session()->has('warning'))
        <div class="alert alert-danger">
            <i class="fas fa-window-close"></i> {{ session('warning') }}
        </div>
    @endif

</div>
