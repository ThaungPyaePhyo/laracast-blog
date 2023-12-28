@auth()
    <x-panel>
        <form method="POST" action="/posts/{{ $post->id }}/comments">
            @csrf

            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?user={{ auth()->id() }}" alt="" width="60" height="60" class="rounded-full">
                <h2>
                    Want to paraticipate?
                </h2>
            </header>
            <x-form.textarea name="body"/>
            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                <x-form.button>Submit</x-form.button>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline">Register</a> or <a href="/login" class="hover:underline">Log in </a> to leave a comment
    </p>
@endauth
