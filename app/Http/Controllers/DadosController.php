<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DadosDefesa;

class DadosController extends Controller
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
            $dados = new DadosDefesa();
            $dados->nome_estudante = $request->input('nome_estudante');
            
            // upload de foto 
            if($request->hasFile('foto') && $request->file('foto')->isValid()){

                $requestImage = $request->foto;

                $extension = $requestImage->extension();

                $imageName=md5($requestImage->foto->getClientOriginalName() . strtotime("now")) . "." . $extension;

                $request->foto->move(public_path('ficheiros/fotos'), $imageName);

                $dados->foto = $imageName;
            }

            //upload da declarcao de nota 

            if($request->hasFile('declaracao_nota') && $request->file('declaracao_nota')->isValid()){

                $requestDeclaracao = $request->declaracao_nota;

                $extension = $requestDeclaracao->extension();

                $declaracaoName=md5($requestDeclaracao->declaracao_nota->getClientOriginalName() . strtotime("now")) . "." . $extension;

                $request->declaracao_nota->move(public_path('ficheiros/declaracoes'), $declaracaoName);

                $dados->declaracao_nota = $declaracaoName;
            }

            //upload da monografia 
            if($request->hasFile('monografia') && $request->file('monografia')->isValid()){

                $requestMonografia = $request->monografia;

                $extension = $requestMonografia->extension();

                $monografiaName=md5($requestMonografia->monografia->getClientOriginalName() . strtotime("now")) . "." . $extension;

                $request->monografia->move(public_path('ficheiros/monografias'), $monografiaName);

                $dados->monografia = $monografiaName;
            }

            //upload de curriculum 
            if($request->hasFile('curriculum') && $request->file('curriculum')->isValid()){

                $requestCurriculum = $request->curriculum;

                $extension = $requestCurriculum->extension();

                $curriculumName=md5($requestCurriculum->curriculum->getClientOriginalName() . strtotime("now")) . "." . $extension;

                $request->curriculum->move(public_path('ficheiros/Curriculum'), $curriculumName);

                $dados->curriculum = $curriculumName;
            }

            $dados->save();
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
