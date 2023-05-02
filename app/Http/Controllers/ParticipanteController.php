<?php

namespace App\Http\Controllers;

use App\Models\DefesaParticipante;
use App\Models\Participante;
use Illuminate\Http\Request;

class ParticipanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $participante = Participante::all();

        return view('admin.participantes', compact('participante'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createParticipanteActive(Request $request)
    {
    
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function storeActive(Request $request)
    {
        //
            //
            $participante = new Participante();
            $participante->name = $request->name;
            $participante->email = $request->email;
            $participante->curso = $request->curso;
            $participante->participante = '0';
            $participante->estudante = $request->estudante;

            $participante->save();

            //$id_participante = $participante->id;
            $userauth = auth()->user();

            $defparticipante = new DefesaParticipante();
            $defparticipante->id_defesa = $request->id_defesa;
            $defparticipante->id_participante = $userauth->id;
    
            if($defparticipante->save()){
    
                return response()->json(['Mensagem' => 'Participacao agendada com sucesso']);
            }else{
                return response()->json(['Mensagem' => 'Esgotado']);
            }
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function storeInactive(Request $request)
    {
        //
            //
            $participante = new Participante();
            $participante->name = $request->name;
            $participante->email = $request->email;
            $participante->curso = $request->curso;
            $participante->participante = $request->participante;
            $participante->estudante = '0';

            $participante->save();
            $id_participante = $participante->id;

            $defparticipante = new DefesaParticipante();
            $defparticipante->id_defesa = $request->id_defesa;
            $defparticipante->id_participante = $id_participante;
    
            if($defparticipante->save()){
    
                return response()->json(['Mensagem' => 'Participacao agendada com sucesso']);
            }else{
                return response()->json(['Mensagem' => 'Esgotado']);
            }
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
