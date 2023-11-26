<div class="mr-3">
    {{-- primer fila --}}
    <div>
        <div class="mb-2">
            <div class="mb-2">
                <label for="">Descripción de la evaluación</label>
                <input type="text" name="description" wire:model="description" placeholder="Descripción de la evaluación"
                    class="inputs-formularios-cortos-email">
            </div>
            @error('description')
            <p class=" text-red-600 p-2 rounded">{{ $message }}</p>
            @enderror

            <label for="course_id">Materia</label>
            <select wire:model="course_id" class="select-formularios form-select">
                <option value="">Selecciona una materia</option>
                @foreach ($materias as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>

    </div>

    {{-- segunda fila --}}
    <div class="mb-2">
        <label for="">Nota</label>
        <input type="number" name="evaluation" wire:model="evaluation" placeholder="Nota:"
            class="inputs-formularios-cortos-email">
    </div>

    @error('evaluation')
    <p class=" text-red-600 p-2 rounded">{{ $message }}</p>
    @enderror
</div>
