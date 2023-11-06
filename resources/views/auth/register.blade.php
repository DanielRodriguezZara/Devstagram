@extends('layout.app')

@section('titulo')
    Registrate en Devstagram
@endsection

@section('contenido')
    <div class = "md:flex md:justify-center md:items-center md:gap-5">
        <div class = "md:w-6/12">
            <img class="w-screen" src="{{asset('img/register.jpg')}}"/>
        </div>
        <div class = "md:w-4/12 shadow-xl bg-white p-6 rounded-lg">
            <form action="{{route('register')}}" method="POST" novalidate>
                @csrf
                <div class = "mb-5">
                    <label for = "name" class = "mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
                    <input  id = "name" name= "name" type="text" placeholder="Ingresa tu nombre" value="{{old('name')}}" class = "border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"/>
                    @error('name')
                        <p class= "bg-red-500 p-2 my-2 text-center text-white rounded-lg">{{$message}}</p>
                    @enderror

                </div>

                <div class = "mb-5">
                    <label for = "username" class = "mb-2 block uppercase text-gray-500 font-bold">Nombre de usuario</label>
                    <input  id = "username" name= "username" type="text" placeholder="Ingresa tu nombre de usuario" value="{{old('username')}}" class = "border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"/>
                    @error('username')
                        <p class= "bg-red-500 p-2 my-2 text-center text-white rounded-lg">{{$message}}</p>
                    @enderror
                </div>

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

                <div class = "mb-5">
                    <label for = "password_confirmation" class = "mb-2 block uppercase text-gray-500 font-bold">Password Confirmación</label>
                    <input  id = "password_confirmation" name= "password_confirmation" type="password" placeholder="Ingresa tu contraseña" class = "border p-3 w-full rounded-lg"/>
                </div>

                <input type = "submit" value="Crear Cuentas" class="bg-sky-600 hover:bg-sky-700 transition-colors w-full cursor-pointer uppercase font-bold  p-3 text-white rounded-lg"/>
            </form>
        </div>
    </div>
@endsection
