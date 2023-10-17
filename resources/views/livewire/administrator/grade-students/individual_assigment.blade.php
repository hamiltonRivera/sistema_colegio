<div class="lg:grid grid-cols-2 sm:grid-col-1">
    {{-- primer columna --}}
    <div>
        <div class="mb-2">
            <div class="mb-2">
                <input type="search" wire:model.live="search_grade" placeholder="Búsqueda del aula"
                    class=" inputs-formularios-cortos">
            </div>

            <label for="">Aulas</label>
            <select name="grade_id" wire:model="grade_id" class="select-formularios form-select"
                aria-label="Default select example">
                <option selected>Selecciona una opción</option>
                @foreach ($grados as $grado)
                    <option value="{{ $grado->id }}">{{ $grado->grade_section }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            @if ($selected_id)
                <button type="button" class="boton-actualizar" wire:click="update()"><i class="fas fa-pen"></i>
                    Actualizar</button>
            @else
                <button type="button" class="boton-guardar" wire:click="asignarEstudiante()"><i
                        class="fas fa-save"></i> Asignar</button>
            @endif
        </div>


    </div>
    {{-- segunda columna --}}
    <div>
        <div class="mb-2">
            <div class="mb-2">
                <input type="search" wire:model.live="search_student" placeholder="Búsqueda del estudiante"
                    class=" inputs-formularios-cortos">
            </div>

            <label for="">Estudiante</label>
            <select name="student_id" wire:model="student_id" class="select-formularios form-select"
                aria-label="Default select example">
                <option selected>Selecciona una opción</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            @if (session()->has('mensaje'))
                <div class="alert alert-danger">
                    <i class="fas fa-window-close"></i> {{ session('mensaje') }}
                </div>
            @endif

        </div>
    </div>
</div>
