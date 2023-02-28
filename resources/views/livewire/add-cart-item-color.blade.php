<div x-data>
    <p class="text-xl text-gray-700 mb-2">Color:</p>
    <select wire:model="color_id"
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
        <option value="" selected disabled>Seleccionar un color</option>
        @foreach ($colors as $color)
            <option value="{{ $color->id }}">{{ $color->name }}</option>
        @endforeach
    </select>
    <!--BOTONES INCREMENT, DECREMENT, AGREGAR CARRITO-->
    <div class="flex mt-4">
        <div class="mr-4">
            <x-secondary-button disabled 
            x-bind:disabled="$wire.qty < 2" 
            wire:loading.attr="disabled"
                wire:target="decrement" 
                wire:click="decrement">
                -
            </x-secondary-button>
            <span class="mx-2 text-gray-700">{{ $qty }}</span>
            <x-secondary-button 
            x-bind:disabled="$wire.qty >= $wire.quantity" 
            wire:loading.attr="disabled"
                wire:target="increment" 
                wire:click="increment">
                +
            </x-secondary-button>
        </div>
        <div class="flex-1">
            <x-button-new
             x-bind:disabled="!$wire.quantity" 
             class="w-full">
                Agregar al carrito de Compra
            </x-button-new>
        </div>
    </div> 
</div>
