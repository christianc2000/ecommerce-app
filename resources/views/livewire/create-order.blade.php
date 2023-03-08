<div class="max-w-7xl px-4 mx-auto sm:px-6 lg:px-8 py-8 grid grid-cols-5 gap-6">
    <div class="col-span-3">
        <div class="bg-white rounded-lg shadow p-6">
            <div>
                <x-label value="Nombre de contacto" />
                <x-input type="text" 
                    wire:model.defer="contact"
                    placeholder="Ingrese el nombre de la persona que recibirá el producto"
                    class="w-full" />
            </div>
            <div>
                <x-label value="Teléfono de contacto" />
                <x-input type="text" 
                wire:model.defer="phone"
                placeholder="Ingrese un número de teléfono de contacto" class="w-full" />
            </div>
        </div>
        <div x-data="{ envio_type: @entangle('envio_type') }">
            <p class="mt-6 mb-3 text-lg text-gray-700 font-semibold">Envíos</p>

            <label for="" class="bg-white rounded-lg shadow px-6 py-4 flex items-center mb-4">
                <input x-model="envio_type" type="radio" value="1" name="envio_type" class="text-gray-600">
                <span class="ml-2 text-gray-700">
                    Recojo en tienda (Calle falsa 123)
                </span>
                <span class="font-semibold text-gray-700 ml-auto">
                    Gratis
                </span>
            </label>
            <div class="bg-white rounded-lg shadow">
                <label for="" class="px-6 py-4 flex items-center">
                    <input x-model="envio_type" type="radio" value="2" name="envio_type" class="text-gray-600">
                    <span class="ml-2 text-gray-700">
                        Envío a domicilio
                    </span>
                </label>
                <div :class="{ 'hidden': envio_type != 2 }" class="px-6 pb-6 grid grid-cols-2 gap-6 hidden">
                    {{-- Departamentos --}}
                    <div>
                        <x-label value="Departamento" />
                        <select wire:model="department_id"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                            <option value="" disabled selected>Seleccione un Departamento</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- Ciudades --}}
                    <div>
                        <x-label value="Ciudad" />
                        <select wire:model="city_id"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                            <option value="" disabled selected>Seleccione una Ciudad</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- Distritos --}}
                    <div>
                        <x-label value="Distrito" />
                        <select wire:model="district_id"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                            <option value="" disabled selected>Seleccione un Distrito</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <x-label value="Dirección" />
                        <x-input class="w-full" type="text" wire:model="address" />
                    </div>
                    <div class="col-span-2">
                        <x-label value="Referencia" />
                        <x-input class="w-full" type="text" wire:model="reference" />
                    </div>
                </div>
            </div>

        </div>
        <div>
            <x-button class="mt-6 mb-4">
                Continuar con la compra
            </x-button>
            <hr>
            <p class="text-sm text-gray-700 mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo vero,
                possimus dolores incidunt iusto laudantium alias laboriosam excepturi quisquam corporis modi odio, eos
                fugit perferendis maxime facilis labore, assumenda molestiae?<a href=""
                    class="font-semibold text-orange-500"> Políticas y privacidad</a></p>

        </div>
    </div>

    <div class="col-span-2">
        <div class="bg-white rounded-lg shadow p-6">
            <ul>
                @forelse (Cart::content() as $item)
                    <li class="flex p-2 border-b border-gray-200">
                        <img class="h-15 w-20 object-cover mr-4" src="{{ asset('storage/' . $item->options->image) }}"
                            alt="">
                        <article class="flex-1">
                            <h1 class="font-bold">
                                {{ $item->name }}
                            </h1>
                            <div class="flex">
                                <p>Cant: {{ $item->qty }}</p>
                                @isset($item->options['color'])
                                    <p class="mx-2">- Color: {{ __($item->options['color']) }}</p>
                                @endisset
                                @isset($item->options['size'])
                                    <p>{{ $item->options['size'] }}</p>
                                @endisset
                            </div>
                            <p>Bs {{ $item->price }}</p>
                        </article>
                    </li>
                @empty
                    <li class="py-6 px-6">
                        <p class="text-center text-gray-700">
                            No tiene agregado ningún item en el carrito
                        </p>
                    </li>
                @endforelse
            </ul>
            <hr class="mt-4 mb-3">
            <div class="text-gray-700">
                <p class="flex justify-between items-center">
                    Subtotal
                    <span>{{ Cart::subtotal() }} Bs</span>
                </p>
                <p class="flex justify-between items-center">
                    Envío
                    <span>Gratis</span>
                </p>
                <hr class="mt-4 mb-3">
                <p class="flex justify-between items-center">
                    <span class="text-lg font-semibold">Total</span>
                    {{ Cart::subtotal() }} Bs
                </p>

            </div>
        </div>

    </div>

</div>
