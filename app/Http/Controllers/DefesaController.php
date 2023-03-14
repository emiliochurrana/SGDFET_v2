<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Defesa;

class DefesaController extends Controller
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
        $defesa = new Defesa();
        $defesa->nome_estudante = $request->input('nome_estudante');
        $defesa->tema = $request->input('tema');
        $defesa->curso = $request->input('curso');
        $defesa->resumo = $request->input('resumo');
        $defesa->nivel = $request->input('nivel');
        $defesa->supervisor =$request->input('supervisor');
        $defesa->oponente = $request->input('oponente');
        $defesa->presidente = $request->input('presidente');
        $defesa->sala = $request->input('sala');
        $defesa->data = $request->input('data');
        $defesa->hora = $request->input('hora');

        $defesa->save();

    }

    /**
     * Display the specified resource.
     */
    public function showDefesa(string $id)
    {
        //
        $defesa = Defesa::findOrFail($id);
        return view('defesa.show', ['defesa'=> $defesa]);
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
