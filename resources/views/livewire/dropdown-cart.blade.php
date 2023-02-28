<div>
    <div class="relative">
        {{-- Be like water. --}}
        <x-dropdown align="right" width="96">
            <x-slot name="trigger">
                <div
                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                    <span class="relative inline-block cursor-pointer">
                        <x-cart color="white" size="30" />
                        <span
                            class="absolute top-0 right-0 inline-block w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full"></span>

                        {{--  <span
                        class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">99
                    </span>
                    --}}
                    </span>
                </div>
            </x-slot>
            <x-slot name="content">
                <div class="py-6 px-6">
                    <p class="tex-center text-gray-700">
                        No tiene agregado ningún item en el carrito
                    </p>
                </div>
            </x-slot>
        </x-dropdown>
    </div>
</div>

