<div class="mr-2">
  <div class="mb-3">
    <label for="">Busqueda sensible</label>
            <input type="search" wire:model.live="search_course" placeholder="Búsqueda de la materia"
                class=" inputs-formularios-cortos form-control">
  </div>

  <div class="mb-3">
    <label for="">Materia</label>
    <select name="course_id" wire:model="course_id" class="select-formularios form-select"
        aria-label="Default select example">
        <option selected>Selecciona una opción</option>
        @foreach ($courses as $course)
            <option value="{{ $course->id }}">{{ $course->name }}</option>
        @endforeach
    </select>
</div>
@error('course_id')
    <p class=" text-red-600 p-2 rounded">{{ $message }}</p>
@enderror
{{--  --}}

<div class="mb-3">
    @if ($selected_id)
    <button type="button" class="boton-actualizar" wire:click="update()"><i class="fas fa-pen"></i> Actualizar</button>
    @else
    <button type="button" class="boton-guardar" wire:click="store()"><i class="fas fa-save"></i> Registrar</button>
    @endif
</div>
</div>
