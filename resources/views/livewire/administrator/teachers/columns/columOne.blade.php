<div class="mr-2">
    <div class="mb-3">
        <label for="">Primer y segundo nombre</label>
        <input type="text" name="first_second_name" id="first_second_name" wire:model="first_second_name" placeholder="primer y segundo nombre:" required class="inputs-formularios-cortos">
      </div>



      <div class="mb-2">
        <label for="">Teléfono</label>
        <input type="text" name="phone_number" wire:input="formatPhoneNumber" wire:model="phone_number" id="phone_number" placeholder="Teléfono:" required class="inputs-formularios-cortos" max="8">
      </div>


    <div class="mb-3">
        <label for="">Inss (Opcional)</label>
        <input type="text" name="inss" id="inss" wire:model="inss" wire:input="formatInss" placeholder="Inss:" class="inputs-formularios-cortos" max="8">
    </div>
</div>
