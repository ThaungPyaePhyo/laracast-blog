<x-layout>
    <article>
        <h1>{{ $post->title }}</h1>
        <div>
            {!! $post->body  !!}
        </div>
        <a href="/">Go Back</a>

    </article>
</x-layout>
