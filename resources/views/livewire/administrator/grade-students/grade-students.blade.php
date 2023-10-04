<div>
    @can('asignar_estudiante_grado')
    <div class="lg:grid grid-cols-2 sm:grid-col-1">
        {{-- primer columna --}}
       <div class="mr-2">
        <div class="text-center mb-3">
            <h4>Asignación individual</h4>
        </div>
         @include('livewire.administrator.grade-students.individual_assigment')
       </div>

       {{-- segunda columna --}}
       <div class="mr-2">
        <div class="text-center mb-3">
            <h4>Asignación Masiva</h4>
        </div>
         @include('livewire.administrator.grade-students.mass_assigment')
       </div>
    </div>
    @endcan

    <div><hr>
         <div  class="mb-3">
            <input type="search" wire:model.live="search" placeholder="Búsqueda:" class=" inputs-formularios-cortos">
         </div>
        <div>
            @include('livewire.administrator.grade-students.table')
        </div>
    </div>
</div>



