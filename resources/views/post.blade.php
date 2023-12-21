<x-layout>
    <article>
        <h1>{{ $post->title }}</h1>
        <p>
           By <a href="">{{ $post->user->name }}</a> <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
        </p>
        <div>
            {!! $post->body  !!}
        </div>
        <a href="/">Go Back</a>

    </article>
</x-layout>
