<x-dropdown>
    <x-slot name="trigger">
        <button class="py-2 pl-2 pr-9 text-sm font-semibold lg:w-32 text-left w-full flex lg:inline-flex">
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px"/>
        </button>
    </x-slot>
    <x-dropdown-item href="/" :active="request()->routeIs('home')">All</x-dropdown-item>
    @foreach($categories as $category)
        <x-dropdown-item :active="isset($currentCategory) && $currentCategory->is($category)" href="/?category={{$category->id}}">{{ $category->name }}</x-dropdown-item>
    @endforeach
</x-dropdown>
