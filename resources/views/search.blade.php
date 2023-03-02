<x-app-layout>
    <div class="max-w-7xl px-4 mx-auto sm:px-6 lg:px-8 py-8">
        <ul>
            @forelse ($products as $product)
                <x-product-list :product="$product" />
            @empty
            <li class="bg-white rounded-lg shadow-2xl">
                <div class="p-4">
                    <p class="text-lg font-semibold text-gray-700">Ningún producto coincide con esos parámetros</p>
                </div>
            </li>
                @endforelse
        </ul>
        <div class="mt-4">
            {{$products->links()}}
        </div>
    </div>

</x-app-layout>
