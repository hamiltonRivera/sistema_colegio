<div>
   <div class="lg:grid grid-cols-2 sm:grid-col-1">
      {{-- formulario de tutor --}}

      <div>
        <div>
            <h2>Datos del tutor</h2><hr>
        </div>
          @include('livewire.administrator.students.tutor.form')
      </div>

      {{-- formulario de estudiante --}}
      <div>
        <div>
            <h2>Datos del estudiante</h2><hr>
        </div>

        <div>
            @include('livewire.administrator.students.form')
        </div>
      </div>
   </div>

  
</div>
