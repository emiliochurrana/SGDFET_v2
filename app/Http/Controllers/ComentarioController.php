<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use App\Models\Estudante;
use App\Models\User;
use Illuminate\Http\Response;

class ComentarioController extends Controller
{
    /**
     * Funcao para listar todos comentarios.
     */
    public function index()
    {
        $comentarios = Comentario::all();
        return view('admin.comentarios', ['comentarios' => $comentarios]);
    }

    
    /**
     * Funcao para pesquisa de comentarios
     */
    public function pesquisa(){

        $search = request('search');

        if($search){
            $comentario = Comentario::where([
                ['nome', 'like', '%', $search. '%']
            ])->get();
        }
        return view('admin.comentarios', ['comentario' => $comentario, 'search' => $search]);

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Funcao para salavar dados de um comentario.
     */
    public function store(Request $request)
    {
        //
        $comentario = new Comentario();
        $comentario->name =$request->input('name');
        $comentario->email = $request->input('email');
        $comentario->mensagem = $request->input('mensagem');
        if(auth()->user()->is_estudante){
        $comentario->is_estudante = '1';
        $comentario->is_visitante = '0';
        }else{
            $comentario->is_estudante = '0';
            $comentario->is_visitante = '1';  
        }
        $user = auth()->user();
        $comentario->id_estudante = $user->id;
        if($comentario->save()){
            return redirect()->back()->with('msgSucessComent', 'Comentario enviado com sucesso');
        }else{
            return redirect()->back()->with('msgErrorComent', 'Erro no envio do comentario');
        }
    }
    
      /*
     Funcao para salavar dados de um comentario.
     
    public function storeComentario(Request $request)
    {
        //
        $comentario = new Comentario();
        $comentario->name =$request->input('name');
        $comentario->email = $request->input('email');
        $comentario->mensagem = $request->input('mensagem');
        $comentario->is_estudante = '0';
        $comentario->is_visitante = '1';
       // $user = auth()->user();
        $comentario->id_estudante = '2';
        if($comentario->save()){
            return redirect()->back()->with('msgSucessMens', 'Comentario enviado com sucesso');
        }else{
            return redirect()->back()->with('msgErrorMens', 'Erro no envio do comentario');
        }
    }*/

    /**
     * Funcao para visualisar um comentario.
     */
    public function show($id)
    {
        //
        $comentario =User::findOrFail($id);        
        $comentOwner = User::where('id', $comentario->id_estudante)->first()->toArray();
        return view('comentarioshow', ['comentario' => $comentario, 'comentOwner' => $comentOwner]);
    }

    /**
     * Funcao para trazer formulario de um comentario.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Funcao para actualizar dados de um comentario.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Funcao para eliminar um comentario.
     */
    public function destroy(string $id)
    {
        Comentario::findOrFail($id)->delete();

        return redirect()->route('comentarios')->with('Mensagem', 'Mensagem eliminada com sucesso');
    }
}
