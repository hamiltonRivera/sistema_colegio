<div>
    @can('Asignar_grado_docente_guia')
    <div class="lg:grid grid-cols-3 sm:grid-col-1">
        @include('livewire.administrator.grades-teachers.columnOne')

     @include('livewire.administrator.grades-teachers.columnTwo')

     @include('livewire.administrator.grades-teachers.columnThree')
      </div>
    @endcan
    
 <div class="mt-5"><hr>
    <div class="mb-3">
        <input type="search" wire:model.live="search" placeholder="Búsqueda:" class=" inputs-formularios-cortos">
      </div>

      <div>
        @include('livewire.administrator.grades-teachers.table')
      </div>
 </div>
</div>
