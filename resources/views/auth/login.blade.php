@extends('layout.app')

@section('titulo')
    Iniciar Sesión en Devstagram
@endsection

@section('contenido')
    <div class = "md:flex md:justify-center md:items-center md:gap-5">
        <div class = "md:w-6/12">
            <img class="w-screen" src="{{asset('img/login.jpeg')}}"/>
        </div>
        <div class = "md:w-4/12 shadow-xl bg-white p-6 rounded-lg">
            <form method="POST" action="{{route('login')}}" novalidate>
                @csrf
                @if(session('mensaje'))
                    <p class= "bg-red-500 p-2 my-2 text-center text-white rounded-lg">{{session('mensaje')}}</p>
                @endif
                <div class = "mb-5">
                    <label for = "email" class = "mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input  id = "email" name= "email" type="email" placeholder="Ingresa tu email" value="{{old('email')}}" class = "border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"/>
                    @error('email')
                        <p class= "bg-red-500 p-2 my-2 text-center text-white rounded-lg">{{$message}}</p>
                    @enderror
                </div>

                <div class = "mb-5">
                    <label for = "password" class = "mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    <input  id = "password" name= "password" type="password" placeholder="Ingresa tu contraseña" value="{{old('email')}}" class = "border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"/>
                    @error('password')
                        <p class= "bg-red-500 p-2 my-2 text-center text-white rounded-lg">{{$message}}</p>
                    @enderror
                </div>

                <div class ="mb-5">
                    <input type="checkbox" name="remember"><label class="mb-2 ml-2 text-gray-500 font-bold text-sm">Recordarme</label>
                </div>

                <input type = "submit" value="Iniciar Sesión" class="bg-sky-600 hover:bg-sky-700 transition-colors w-full cursor-pointer uppercase font-bold  p-3 text-white rounded-lg"/>
            </form>
        </div>
    </div>
@endsection
