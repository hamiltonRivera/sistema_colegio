<div>
    @can('crear_asignaturas')
    <div>
        @include('livewire.administrator.courses.form')
    </div>
    @endcan
    <div class="mb-2">
        @include('livewire.administrator.courses.search')
    </div>
    <div>
        @include('livewire.administrator.courses.table')
    </div>
</div>
