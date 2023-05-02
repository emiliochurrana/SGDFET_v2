<?php

namespace App\Http\Controllers;

use App\Models\Estudante;
use Illuminate\Http\Request;
use App\Models\Monografia;
use App\Models\User;
use Illuminate\Http\Response;

class MonoController extends Controller
{
    /**
     * Funcao para listar todas monografias publicadas.
     */
    public function index(){

        $u = auth()->user();

        $mono = Monografia::all();
        return view('admin.monografiaview', ['monos' => $mono, 'u'=>$u]);
        
    }


    /**
     * Funcao para pesquisar monografias publicadas (Estudantes).
     */
    public function pesquisa(){
            $search = request('search');

        if($search){
            $mono = Monografia::where([
                ['autor', 'like', '%', $search. '%']
            ])->get();
        }
        return view('usuario.monografias', ['mono' => $mono, 'search' => $search]);
    }

     /**
     * Funcao para pesquisar monografias publicadas (Administracao).
     */
    public function pesquisaAdmin(){
        
        $search = request('search');

    if($search){
        $mono = Monografia::where([
            ['autor', 'like', '%', $search. '%']
        ])->get();
    }
    return view('admin.monografiaview', ['monografia' => $mono, 'search' => $search]);
}


    /**
     * Funcao para carregar formulario de cadastro de uma nova monografia.
     */
    public function create()
    {
        $estudantes = Estudante::with('dado')->get();

        return view('admin.newmonografia', compact('estudantes'));
    }

    /**
     * Funcao para enviar dados de uma monografia na base de dados.
     */
    public function store(Request $request)
    {
        $mono = new Monografia();
        $mono->autor = $request->input('autor');
        $mono->tema = $request->input('tema');
        $mono->curso = $request->input('curso');
        $mono->resumo = $request->input('resumo');
        $mono->nivel = $request->input('nivel');
        $mono->supervisor = $request->input('supervisor');
        $mono->ficheiro =$request->input('ficheiro');
        
        if($mono->save()){

            return redirect()->route('monografiaview')->with(['Mensagem' => 'Monografia publicada com sucesso!']);
        }else{
            return redirect()->route('newmonografia')->with(['Mensagem' => 'Erro ao publicar a monografia!']);
        }
    }
    

    /**
     * Funcao para visualizar dados de uma monografia.
     */
    public function showAdmin(string $id)
    {
        $mono = Monografia::findOrFail($id);
        return view('admin.showmonografia', ['mono'=> $mono]);
    }

        /**
     * Funcao para visualizar dados de uma monografia.
     */
    public function showUser(string $id)
    {
        $mono = Monografia::findOrFail($id);
        return view('usuario.showmonografia', ['mono'=> $mono]);
    }

    /*public function dashboard(){
        $user = auth()->user();
        $mono = $user->mono;
        return view('view.dashboard', ['mono' => $mono]);
    }*/


    
    /**
     * Funcao para carregar formulario para editar dados de uma monografia.
     * 
     */
    public function edit($id)
    {
        $mono = Monografia::findOrFail($id);
        return view('admin.editmonografia', ['mono' => $mono]);
    }


    /**
     * Funcao para actualizar dados de uma monografia.
     */
    public function update(Request $request)
    {
        Monografia::findOrFail($request->id)->update($request->all());

        if($request->all()){

            return redirect()->route('monografiaview')->with(['Mensagem' => 'Dados da monografia actualizados com sucesso!']);
        }else{
            return redirect()->route('editmonografia')->with(['Mensagem' => 'Erro ao actualizar od dados da monografia!']);
        }
    }

    
    /**
     * Funcao para eliminar uma monografia.
     */
    public function destroy($id)
    {
        Monografia::findOrFail($id)->delete();
        
        return redirect()->route('monografiaview')->with(['Mensagem' => 'Monografia eliminada com sucesso!']);
     
    }
}
