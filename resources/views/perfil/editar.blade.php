@extends('layout.app')

@section('titulo')
    Editar perfil: {{auth()->user()->username}}
@endsection

@section('contenido')
  <div class="md:flex md:justify-center">
        <div class = "md:w-1/2 shadow-xl bg-white p-6">
            <form action="{{route('perfil.post')}}" enctype="multipart/form-data" method="POST">
            @csrf
                <div class = "mb-5">
                    <label for="username" class = "mb-2 block font-bold text-gray-500 uppercase">Username</label>
                    <input id="username" name="username" type="text" value="{{auth()->user()->username}}" class="border w-full @error('username') border-red-500 @enderror" >
                </div>
                <div class ="mb-5">
                    <label for="imagen" class ="uppercase text-gray-500 mb-2 block font-bold">Imagen</label>
                    <input type="file" id="imagen" name="imagen">
                </div>
                <div class = "mb-5">
                    <label for="email" class = "mb-2 block font-bold text-gray-500 uppercase">Email</label>
                    <input id="email" name="email" type="text" value="{{auth()->user()->email}}" class="border w-full @error('email') border-red-500 @enderror" >
                </div>

                @error('username')
                    <p>{{$message}}</p>
                @enderror
                <input type="submit" value="Editar perfil" class="w-full bg-sky-600 p-2 text-white font-bold rounded-lg cursor-pointer uppercase hover:bg-sky-700 transition-colors">
            </form>
        </div>
  </div>
@endsection
