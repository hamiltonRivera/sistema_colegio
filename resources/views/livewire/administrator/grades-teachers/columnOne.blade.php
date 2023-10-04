<div class="mr-2">
    <div class="mb-3">
     <input type="search" wire:model.live="search_grade" placeholder="Búsqueda del aula" class=" inputs-formularios-cortos">
     <label for="">Aulas</label>
     <select name="grade_id" wire:model="grade_id" class="select-formularios form-select"
         aria-label="Default select example">
         <option selected>Selecciona una opción</option>
         @foreach ($aulas as $aula)
             <option value="{{ $aula->id }}">{{ $aula->grade_section }}</option>
         @endforeach
     </select>
     @error('grade_id')
     <p class=" text-red-600 p-2 rounded">{{ $message }}</p>
     @enderror
    </div>
  </div>
