@extends ('layout')

@section('banner')
    <h1>My Blog</h1>
@endsection

@section('content')
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
@endsection