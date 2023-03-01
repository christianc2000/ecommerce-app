<div>
    <div class="relative">
        {{-- Be like water. --}}
        <x-dropdown align="right" width="96">
            <x-slot name="trigger">
                <div
                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                    <span class="relative inline-block cursor-pointer">
                        <x-cart color="white" size="30" />
                        @if (Cart::count() == 0)
                            <span
                                class="absolute top-0 right-0 inline-block w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full"></span>
                        @else
                            <span
                                class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">{{ Cart::count() }}</span>
                    </span>
                    @endif
                    </span>
                </div>
            </x-slot>
            <x-slot name="content">
                <ul>
                    @forelse (Cart::content() as $item)
                        <li class="flex p-2 border-b border-gray-200">
                            <img class="h-15 w-20 object-cover mr-4"
                                src="{{ asset('storage/' . $item->options->image) }}" alt="">
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
                                        <p>{{$item->options['size']}}</p>
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
                @if (Cart::count())
                    <div class="py-2 px-3">
                        <p class="text-lg text-gray-700 mt-2"><span class="font-bold">Total:</span> Bs
                            {{ Cart::subtotal() }}</p>
                        <x-button-enlace color='orange' class="w-full">Ir al carrito de compra</x-button-enlace>
                    </div>
                @endif
            </x-slot>
        </x-dropdown>
    </div>
</div>
