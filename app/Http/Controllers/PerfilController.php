<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('perfil.editar');
    }
    public function store(Request $request)
    {
        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request,[
            'username' => ['required', 'unique:users,username,' . auth()->user()->id, 'max:20', 'min:3', 'not_in:puto,editar-perfil,configuracion,boton'],
            'email' => ['required', 'unique:users,email,' . auth()->user()->id, 'max:30', 'min:8', 'email'],
        ]);

        if($request->imagen){
            $imagen = $request->file('imagen');
            $nombreImagen = Str::uuid() . "." .$imagen->extension();

            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1000,1000);

            $imagenPath = public_path('perfiles'). "/" . $nombreImagen;
            $imagenServidor->save($imagenPath);
        }


        //Guardando los valores
        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->email = $request->email;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ??'';
        $usuario->save();

        return redirect()->route('post.index', $usuario->username);

    }
}
