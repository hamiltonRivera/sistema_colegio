<div class="mr-2">
    <div class="mb-3">
        <label for="">primer y segundo apellido</label>
        <input type="text" name="name" id="first_second_last_name" wire:model="first_second_last_name"
            placeholder="primer y segundo apellido:" required class="inputs-formularios-cortos">
    </div>

    <div class="mb-3">
        <label for="">Correo del docente</label>
        <input type="email" name="email" id="email" wire:model="email" wire:input="validarCorreo"
            placeholder="correo del docente:" required
            class="block
        md:w-52
        sm:w-80
        px-3
        py-1.5
        text-base
        font-normal
        text-gray-700
        bg-white bg-clip-padding
        border border-solid border-gray-300
        rounded
        transition
        ease-in-out
        m-0
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
    </div>

    @if (session()->has('validacion_correo'))
        <div class="alert alert-info">
            <i class="fas fa-info-circle"></i> {{ session('validacion_correo') }}
        </div>
    @endif

    @if ($selected_id)
        <div class="mb-3">
            <label for="">Estado</label>
            <select name="status" wire:model="status" class="select-formularios form-select"
                aria-label="Default select example">
                <option selected>Selecciona una opción</option>
                @foreach ($estados as $estado)
                    <option value="{{ $estado }}">{{ $estado }}</option>
                @endforeach
            </select>
        </div>
    @endif
</div>
