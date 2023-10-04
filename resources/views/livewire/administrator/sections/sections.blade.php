<div>
    <div class="lg:grid grid-cols-2 sm:grid-col-1 mb-3">
        @can('Crear_grados')
        <div>
            @include('livewire.administrator.sections.form')
         </div>
        @endcan
         <div>
            <div class="mb-3">
               @include('livewire.administrator.sections.search')
            </div>

            <div>
                @include('livewire.administrator.sections.table')
            </div>
         </div>
    </div>

    <br><hr>
    <h4>Docentes guías asignados</h4>
    <div class="mt-5">
        <div class="mb-3">
            <input type="text" wire:model.live="search_teacher" class="p-2 border rounded mr-2" placeholder="Buscador sensible">
        </div>
        @include('livewire.administrator.sections.coord_teacher_table')
    </div>

</div>
