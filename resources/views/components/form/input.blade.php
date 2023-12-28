@props(['name'])
<x-form.field>
    <x-form.label name="{{ $name }}"/>
    <input class="border border-gray-400 p-2 w-full rounded"
           name="{{ $name }}"
           value="{{ old($name) }}"
           id="{{ $name }}" required
            {{ $attributes }}
    />
    <x-form.error name="{{ $name }}"/>
</x-form.field>
