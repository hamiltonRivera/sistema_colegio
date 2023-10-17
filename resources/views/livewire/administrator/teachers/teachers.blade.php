<div>
    @can('crear_docente')
   
    <div>
        @include('livewire.administrator.teachers.form')
      </div>
    @endcan

   <div><hr>
     <div class="mb-3">
        <input type="text" wire:model.live="search" class="p-2 border rounded mr-2" placeholder="Buscador sensible">
     </div>
    @include('livewire.administrator.teachers.table')
   </div>
</div>
