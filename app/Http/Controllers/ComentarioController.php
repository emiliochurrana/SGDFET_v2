<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use App\Models\User;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $comentario = new Comentario();
        $comentario->nome_estudante = $request->input('nome');
        $comentario->email = $request->input('email');
        $comentario->mensagem = $request->input('mensagem');
        $user = auth()->user();
        $comentario->id_estudante = $user->id;
        $comentario->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $comentario =User::findOrFail($id);        
        $comentOwner = User::where('id', $comentario->id_estudante)->first()->toArray();
        return view('comentarios.show', ['comentario' => $comentario, 'comentOwner' => $comentOwner]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
