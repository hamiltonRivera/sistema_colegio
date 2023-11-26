<div class="mb-3">
  {{-- primer fila --}}
  <div>
    <div class="mb-2">
        <div class="mb-2">
            <input type="search" wire:model.live="search_student" placeholder="Búsqueda del estudiante"
                class=" inputs-formularios-cortos">
        </div>

        <label for="">Estudiante</label>
        <select name="teacher_id" wire:model="student_id" class="select-formularios form-select"
            aria-label="Default select example">
            <option selected>Selecciona una opción</option>
            @foreach ($students as $student)
                <option value="{{ $student->id }}">{{ $student->name }}</option>
            @endforeach
        </select>
    </div>
    @error('student_id')
    <p class=" text-red-600 p-2 rounded">{{ $message }}</p>
    @enderror
  </div>

  {{-- segunda fila --}}
  <div>
    <div class="mb-3">
        <label for="">Fecha de evaluación</label>
        <input wire:model.lazy="date" type="date" name="date" class="inputs-formularios-cortos" min="2021-01-01" max="2030-12-31">
      </div>

      @error('date')
      <p class=" text-red-600 p-2 rounded">{{ $message }}</p>
      @enderror
  </div>

  {{-- tercer fila --}}
  <div>
    @if ($selected_id)
    <button type="button" class="boton-actualizar" wire:click="update()"><i class="fas fa-pen"></i> Actualizar</button>
    @else
    <button type="button" class="boton-guardar" wire:click="store()"><i class="fas fa-save"></i> Registrar</button>
    @endif
  </div>
</div>
