<div class="mr-2">
    <div class="mb-3">
      <input type="search" wire:model.live="search_teacher" placeholder="Búsqueda del docente guía" class=" inputs-formularios-cortos">
      <label for="">Docentes</label>
      <select name="grade_id" wire:model="user_id" class="select-formularios form-select"
          aria-label="Default select example">
          <option selected>Selecciona una opción</option>
          @foreach ($docenteCoordinadorUsers as $i)
              <option value="{{ $i->id }}">{{ $i->name }}</option>
          @endforeach
      </select>

      @error('user_id')
      <p class=" text-red-600 p-2 rounded">{{ $message }}</p>
      @enderror
    </div>
   </div>
