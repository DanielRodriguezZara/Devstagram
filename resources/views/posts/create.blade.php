@extends('layout.app')

@section('titulo')
    Crear publicación
@endsection

@push('style')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class = "md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="{{route('imagen.store')}}" method="POST" id="dropzone" class= "dropzone border-dashed border-2 w-full h-96 rounded flex flex-col items-center justify-center">
               @csrf
            </form>
        </div>
        <div class="md:w-1/2 p-10 shadow-xl bg-white rounded-lg mt-6 md:mt-0">
            <form action="{{route('posts.store')}}" method="POST" novalidate>
                @csrf
                <div class = "mb-5">
                    <label for = "titulo" class = "mb-2 block uppercase text-gray-500 font-bold">Titulo</label>
                    <input  id = "titulo" name= "titulo" type="text" placeholder="Titulo de la publicación" value="{{old('titulo')}}" class = "border mb-3 p-3 w-full rounded-lg @error('titulo') border-red-500 @enderror"/>
                    @error('titulo')
                        <p class= "bg-red-500 p-2 my-2 text-center text-white rounded-lg">{{$message}}</p>
                    @enderror
                </div>
                <div class = "mb-5">
                    <label for = "descripcion" class = "mb-2 block uppercase text-gray-500 font-bold">Decripción</label>
                    <textarea  id = "descripcion" name= "descripcion" type="text" placeholder="Descripción de la publicación" value="{{old('descripcion')}}" class = "border p-3 w-full rounded-lg @error('descripcion') border-red-500 @enderror"></textarea>
                    @error('descripcion')
                        <p class= "bg-red-500 p-2 my-2 text-center text-white rounded-lg">{{$message}}</p>
                    @enderror
                </div>
                <div class ="mg-5">
                    <input type="hidden" name="imagen" value="{{old('imagen')}}">
                    @error('imagen')
                        <p class= "bg-red-500 p-2 my-2 text-center text-white rounded-lg">{{$message}}</p>
                    @enderror
                </div>
                <input type = "submit" value="Publicar" class="bg-sky-600 hover:bg-sky-700 transition-colors w-full cursor-pointer uppercase font-bold  p-3 text-white rounded-lg mt-5"/>
            </form>
        </div>
    </div>
@endsection
