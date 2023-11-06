@extends('layout.app')

@section('titulo')
    Tu cuenta
@endsection


@section('contenido')
    <div class="flex justify-center w-full">
        <div class="w-1/2 h-[30vh] flex justify-between">
            <div class="w-1/3 p-2 rounded-full">
                <img class = "w-full rounded-full h-full" src="{{$user->imagen ? asset('perfiles') . "/" . $user->imagen : asset('img/user.svg')}}">
            </div>

            <div class="w-2/3 px-5 pt-4">
                <div class = "flex items-center gap-4">
                    <p class="text-3xl text-gray-600"> {{$user->username}} </p>
                    @auth
                        @if ($user->id === auth()->user()->id)
                            <a href="{{route('perfil.index')}}" type="submit" class = "px-4 py-2 bg-sky-600 hover:bg-sky-700 transition-colors rounded-md text-white text-sm font-bold">Editar perfil</a>
                        @endif
                        @if ($user->id != auth()->user()->id)
                            @if(!$user->siguiendo(auth()->user()))
                                <form action="{{route('users.follow', $user)}}" method="POST">
                                    @csrf
                                    <input type="submit" class="px-4 py-2 bg-sky-600 hover:bg-sky-700 text-white rounded-lg cursor-pointer" value="Seguir"/>
                                </form>
                            @else
                                <form action="{{route('users.unfollow', $user)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg cursor-pointer" value="Dejar de seguir"/>
                                </form>
                            @endif
                        @endif
                    @endauth
                </div>
                <div class = "flex w-full items-center pt-4 justify-between">
                    <p class = "text-slate-800 text-sm font-bold">{{$user->followers()->count()}} @choice('Seguidor|Seguidores', $user->followers()->count()) </p>
                    <p class = "text-slate-800 text-sm font-bold">{{$user->followings()->count()}} Seguidos </p>
                    <p class = "text-slate-800 text-sm font-bold">{{$user->posts->count()}} Posts</p>
                </div>
            </div>
        </div>
    </div>

    <section class="mt-5">
        @if ($posts->count())
        <div class = "grid grid-cols-3 gap-5">
            @foreach ($posts as $post)
                <a href="{{route('posts.show',['post' => $post, 'user' => $user])}}">
                    <img src= "{{asset('uploads') . "/" . $post->imagen}}" alt = "{{$post->titulo}}">
                </a>
            @endforeach
        </div>
        @else
            <h2 class="text-center mt-5 font-bold text-lg text-gray-500 uppercase">no se encontraron post</h2>
        @endif

        <div class="mt-5">
            {{$posts->links('pagination::tailwind')}}
        </div>
    </section>
@endsection
