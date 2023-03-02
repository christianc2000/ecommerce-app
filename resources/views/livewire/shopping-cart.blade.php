<div class="max-w-7xl px-4 mx-auto sm:px-6 lg:px-8 py-8">
    <section class="bg-white rounded shadow-lg p-6 text-gray-700">
        <h1 class="text-lg font-semibold"> CARRO DE COMPRA
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th></th>
                        <th>Precio</th>
                        <th>Cant</th>
                        <th>Total</th>
                    </tr>


                </thead>
                <tbody>
                    @foreach (Cart::content() as $item)
                        <tr>
                            <td>
                                <div class="flex">
                                    <img class="h-15 w-20 object-cover mr-4"
                                        src="{{ asset('storage/' . $item->options->image) }}" alt="">
                                    <div>
                                        <p class="font-bold">{{ $item->name }}</p>
                                        @if ($item->options->color)
                                            <span class="mr-1">
                                                Color: {{ __($item->options->color) }}
                                            </span>
                                        @endif
                                        @if ($item->options->size)
                                            {{ $item->options->size }}
                                        @endif
                                    </div>

                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

    </section>
</div>
