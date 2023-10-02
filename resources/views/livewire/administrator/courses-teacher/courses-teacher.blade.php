<div>
    @can('asignar_materia_docente')
    <div class="mb-3">
        @include('livewire.administrator.courses-teacher.form')
    </div>
    @endcan


    <div class="mb-3">
        @include('livewire.administrator.courses-teacher.search')
    </div>

    <div>
        @include('livewire.administrator.courses-teacher.table')
    </div>
</div>
