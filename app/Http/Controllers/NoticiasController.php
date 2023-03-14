<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiasController extends Controller
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
        $noticia = new Noticia();
        //upload de foto 
        if($request->hasFile('foto') && $request->file('foto')->isValid()){

            $requestImage = $request->foto;

            $extension = $requestImage->extension();

            $imageName=md5($requestImage->foto->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request->foto->move(public_path('ficheiros/fotos/noticia'), $imageName);

            $noticia->foto = $imageName;
        }

        $noticia->titulo = $request->input('titulo');
        $noticia->descricao = $request->input('descricao');
        $noticia->data = $request->input('data');
        $noticia->link = $request->input('link');

        $noticia->save();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
