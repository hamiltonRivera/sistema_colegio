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

    
</div>
