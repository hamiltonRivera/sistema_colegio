<div>
    @if (auth()->user()->hasRole(['Docente', 'Docente_coordinador']))
        {{ auth()->user()->teacher->name }}
        <div class="mb-3">
            @include('livewire.administrator.evaluations.form')
        </div>
    @else
    @endif
    <div>
        <div class="mt-5">
            <hr>
            <div class="mb-3">
                <input type="text" wire:model.live="search" class="p-2 border rounded mr-2"
                    placeholder="Buscador sensible">
            </div>
        </div>
        @include('livewire.administrator.evaluations.table')
    </div>
</div>
