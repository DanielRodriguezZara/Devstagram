<div>
    @if($posts->count())
        <div class = "grid grid-cols-3 gap-5">
            @foreach ($posts as $post)
                <a href="{{route('posts.show',['post' => $post, 'user' => $post->user])}}">
                    <img src= "{{asset('uploads') . "/" . $post->imagen}}" alt = "{{$post->titulo}}">
                </a>
            @endforeach
        </div>
    @endif
</div>
