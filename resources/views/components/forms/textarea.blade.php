@props(['label', 'name'])

@php
    $defaults = [
        'id' => $name,
        'name' => $name,
        'class' => 'rounded-xl bg-white/10 border border-indigo-800 px-5 py-4 w-full',
        'rows' => 5,
        'value' => old($name, $attributes->get('value')),
    ];
@endphp

<x-forms.field :$label :$name>
    <textarea {{ $attributes($defaults) }}>{{ old($name, $attributes->get('value')) }}</textarea>
</x-forms.field>
