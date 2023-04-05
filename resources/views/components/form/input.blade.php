
@props(['name', 'type' => 'text', 'label'])

<x-form.field>
    <x-form.label name="{{ $name }}" />
    <input class="border border-gray-200 p-2 w-full rounded bg-white" type="{{ $type }}" id="{{ $name }}"
        name="{{ $name }}" {{ $attributes(['value' => old($name)]) }} />
    <x-form.error name="{{ $name }}" />
</x-form.field>