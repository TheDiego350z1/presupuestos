<div>
    <i
        class="fa-solid fa-money-bill-trend-up fa-5x cursor-pointer"
        title="Realizar ingreso"
        wire:click="$set('open', true)"
    >
    </i>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Ingreos
        </x-slot>
        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="Nombre" />
                <x-jet-input class="w-full" type="text" wire:model.defer="nombre" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Monto" />
                <x-jet-input class="w-full" type="number" wire:model.defer="monto" />
            </div>

            <div class="mb-4 flex">
                <div class="w-1/2">
                    <x-jet-label value="Fecha" />
                    <x-jet-input class="w-full" type="date" wire:model.defer="fecha" />
                </div>
                <div class="w-1/2">
                    <x-jet-label value="Tipo" />
                    <select class="select w-full" wire:model.defer="tipo">
                        <option></option>
                        @foreach ($etiquetas as $etiqueta)

                            @if ($etiqueta->tipo == 1)
                                <option value="{{$etiqueta->id}}">{{$etiqueta->nombre}}</option>
                            @endif

                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-4 px-4">
                <x-jet-label vanue="nombre" />
                <x-jet-input id="{{ $identificador }}" class="w-full" type="file" wire:model="photo"/>
                @error('photo') <span class="photo">{{ $message }}</span> @enderror
            </div>

        </x-slot>
        <x-slot name="footer">

            <span wire:loading wire:target="guardar">
                Guardando
            </span>

            <x-jet-button wire:loading.attr="disabled" wire:target="guardar, photo" wire:click="guardar">
                Guardar
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
