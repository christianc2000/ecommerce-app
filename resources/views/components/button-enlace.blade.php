@props(['color'=>'gray'])
<a {{ $attributes->merge(['type' => 'button', 'class' => "inline-flex items-center justify-center px-4 py-2 bg-$color-600"]) }}>
    {{ $slot }}
</a>
