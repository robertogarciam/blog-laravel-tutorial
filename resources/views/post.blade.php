@extends ('layout')

@section('banner')
    <h1>My Blog</h1>
@endsection

@section('content')
<article>        
            <h1>{{$post->title}}</h1>
            <div>
                <!-- <?= $post->body ?> -->
                {!!$post->body!!}
            </div>
    </article>

    <a href="/">Go Back</a>
@endsection