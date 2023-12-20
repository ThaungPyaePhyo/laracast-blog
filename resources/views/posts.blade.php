<x-layout>
    @foreach($posts as $post)
        <article class="{{$loop->even ? 'footbar' : ''}}">
            <h1>
                <a href="/posts/{{ $post->id }}">
                    {!! $post->title !!}
                </a>
            </h1>
            <p>
                <a href="#">{{ $post->category->name }}</a>
            </p>
            <div>
                {{ $post->excerpt }}
            </div>
        </article>
    @endforeach
</x-layout>
