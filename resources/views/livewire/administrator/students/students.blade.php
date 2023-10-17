<div>
 {{-- formulario de estudiante --}}
 @can('crear_estudiante')
 <div>
    <p class=" text-red-600 p-2 rounded">*Generar código antes de guardar</p>
</div>
 @endcan
 @can('crear_estudiante')
 <div>
    @include('livewire.administrator.students.form')
</div>
 @endcan
     <div class="mt-3"><hr>
        <div class="mb-3">
            <input type="text" wire:model.live="search" class="p-2 border rounded mr-2" placeholder="Buscador sensible">
            
        </div>

        <div>
          @include('livewire.administrator.students.table')
        </div>
     </div>


</div>
