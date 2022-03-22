<x-layout>
    @foreach ($posts as $post)
        <article class="{{$loop->even ? 'foobar' : ''}}">
            <a href="/posts/{{$post->slug}}">
                <h1>
                    <!-- <?= $post->title; ?> -->
                    {{$post->title}}
                </h1>
            </a>            
            <div>
                <!-- <?= $post->excerpt; ?> -->
                {{$post->excerpt}}
            </div>
        </article>
    @endforeach
</x-layout>

