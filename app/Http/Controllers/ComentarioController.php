<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(Request $request, User $user, Post $post){
        //validad
        $this->validate($request,[
            'comentario' => 'required|max:255'
        ]);

        //almacenar
        Comentario::create([
            'user_id' => auth()->user()->id, //usuario que comenta y esta autenticado
            'post_id' => $post->id,
            'comentario' => $request->comentario
        ]);

        //imprimir mesaje de exito
        return back()->with('mensaje', 'Comentario Realizado Correctamente');
    }
}
