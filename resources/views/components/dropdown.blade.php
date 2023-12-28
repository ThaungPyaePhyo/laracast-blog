@props(['trigger'])
<div x-data="{show : false}" class="relative">
   <div @click="show = !show">
        {{ $trigger }}
   </div>
    <div x-show="show" class="py-2 absolute bg-gray-100 w-full mt-2 rounded-xl w-32" style="display: none">
        {{ $slot }}
    </div>
</div>
