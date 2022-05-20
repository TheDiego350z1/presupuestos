<div>
    <i
        class="fa-solid fa-tags fa-5x cursor-pointer"
        title="Crear etiqueta"
        wire:click="$set('open', true)"
    >

    </i>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            <h3>Creación de etiquetas</h3>
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Nombre" />
                <x-jet-input class="w-full" type="text" placeholder="Nombre de etiqueta" wire:model.defer="nombre" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Tipo de etiqueta" />
                <select  class="w-full select" wire:model.defer="tipo" >
                    <option></option>
                    <option value="1">Ingreso</option>
                    <option value="0">Egreso</option>
                </select>
            </div>

        </x-slot>
        <x-slot name="footer">
            <x-jet-button wire:click="crear">
                Crear Etiqueta
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>




</div>
