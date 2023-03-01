@props(["color"=>"orange"])

<a {{ $attributes->merge(['type' => 'button', 'class' => "inline-flex items-center justify-center px-4 py-2 bg-$color-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-$color-600 active:bg-$color-600 focus:outline-none focus:ring-2 focus:ring-$color-500 focus:ring-offset-2 transition ease-in-out duration-150"]) }}>
    {{ $slot }}
</a>

