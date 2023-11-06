@extends('layout.app')

@section('titulo')
    Página principal
@endsection

@section('contenido')
    <!-- Siempre que es un componente tiene que escribirse la x junto con el nombre del componente -->
    <x-listar-post :posts="$posts"/>
@endsection
