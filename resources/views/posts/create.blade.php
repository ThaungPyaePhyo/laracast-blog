<x-layout>
    <section class="px-6 py-8 max-w-sm mx-auto">
        <h1 class="text-lg font-bold mb-4">
            Publish New Post
        </h1>
        <x-panel class="">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
                    Title
                </label>
                <input class="border border-gray-400 p-2 w-full" name="title" value="{{ old('title') }}" id="title" required/>
                @error('title')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="thumbnail">
                    Thumbnail
                </label>
                <input class="border border-gray-400 p-2 w-full" type="file" name="thumbnail"  id="thumbnail" required/>
                @error('thumbnail')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
                    Excerpt
                </label>
                <textarea class="border border-gray-400 p-2 w-full" name="excerpt" id="excerpt">
                    {{ old('excerpt') }}
                </textarea>
                @error('excerpt')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
                    Body
                </label>
                <textarea class="border border-gray-400 p-2 w-full" name="body" id="body">
                    {{ old('body') }}
                </textarea>
                @error('body')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category">
                    Body
                </label>
                <select name="category_id">
                    @foreach(\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>
                @error('body')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <x-submit-button>Publish</x-submit-button>
        </form>
        </x-panel>
    </section>
</x-layout>
