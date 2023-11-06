@extends('layout.app')
@section('titulo')
    {{$post->titulo}}
@endsection

@section('contenido')
    <div class ="container flex m-auto w-[70vw] h-[75vh] bg-white shadow-lg">
        <div class ="w-1/2 h-full">
            <img class = "w-full h-full" src="{{asset('uploads' . "/" . $post->imagen)}}">
        </div>
        <div class ="w-1/2">
            <div class = "border border-neutral-500 p-3 h-[8vh] flex items-center">
                <h1 class ="font-bold">{{$post->user->username}}</h1>
            </div>
            <div class ="h-[46vh] p-3">
                @if ($post->comentarios->count())
                    @foreach ($post->comentarios as $comentario )
                        <a href ="{{route('post.index', $comentario->user)}}"class ="font-bold">{{$comentario->user->username}}</a>
                        <p>{{$comentario->comentario}}</p>
                        <p class ="text-sm text-gray-500">{{$comentario->created_at->diffForHumans()}}</p>
                    @endforeach
                @else
                    <p>no hay comentarios</p>
                @endif
            </div>
            <div class ="h-[14vh] p-3">
                @auth
                    <livewire:like-post :post="$post" />
                @endauth
            </div>
            @auth
            <div class ="h-[7vh] ">
                <form action="{{route('comentario.store', ['user' => $user, 'post' => $post])}}" method="POST">
                    @csrf
                    <div class ="w-full flex items-center">
                        <textarea id="comentario" name="comentario" type="text" placeholder="Escribe un comentario" class ="block p-1 w-full text-sm bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500  @error('comentario') border-red-500 @enderror"></textarea>
                        <button class="text-blue-500 w-1/6 p-2">Publicar</button>
                    </div>
                </form>
            </div>
            @endauth
        </div>
    </div>
    @auth
        @if($post->user_id === auth()->user()->id)
            <form method="POST" action="{{ route('posts.destroy', $post) }}" class="flex justify-center items-center mt-5">
                @method('DELETE')
                @csrf
                <input type="submit" class = "bg-red-500 p-4 rounded-lg shadow-md cursor-pointer text-white" value="Eliminar publicación" />
            </form>
        @endif
    @endauth

@endsection
