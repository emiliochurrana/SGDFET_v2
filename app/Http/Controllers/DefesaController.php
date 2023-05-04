<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Defesa;
use App\Models\DefesaDocente;
use App\Models\User;
use Illuminate\Http\Response;
use mysqli;

class DefesaController extends Controller
{
    /**
     * Funcao para listar todas defesas marcadas.
     */
    public function index()
    {
        $defesas = Defesa::with('estudanteDefesa')->get();
        return view('admin.defesaview', ['defesas' => $defesas]);
    }


    /**
     * Funcao para pesquisa de defesas marcadas (estudantes).
     */
    public function pesquisa(){
        $search = request('search');

        if($search){
            $defesa = Defesa::where([
                ['autor', 'like', '%', $search. '%']
            ])->get();
        }
        return view('usuario.defesas', ['defesa' => $defesa, 'search' => $search]);
    }


     /**
     * Funcao para pesquisa de defesas marcadas (Administracao).
     */
    public function pesquisaAdmin(){
        $search = request('search');

        if($search){
            $defesa = Defesa::where([
                ['autor', 'like', '%', $search. '%']
            ])->get();
        }
        return view('admin.defesaview', ['defesa' => $defesa, 'search' => $search]);
    }


    /**
     * Funcao para carregar o formulario de cadastro de uma nova defesa.
     */
    public function retorna(Request $request){
        $search = $request->username;
        if($search == ''){
            $estudantes = User::orderby('name', 'asc')->where(['is_estudante' => 1])->select('id', 'name', 'username')->limit(1)->get();
        }else{
            $estudantes = User::with('estudanteUser')->orderby('name', 'asc')->select('id', 'name', 'username')
            ->where(['username'=> $search])->limit(1)->get();
        }

        $response = array();
        foreach($estudantes as $estudante){
            $response[] = array("num_estudante" => $estudante->estudanteUser->numestudante);
            $response[] = array("id_estudante" => $estudante->id);
            $response[] = array("name" => $estudante->name);
            $response[] = array("curso" => $estudante->estudanteUser->curso);
            $response[] = array("supervisor" => $estudante->estudanteUser->supervisor); 
            $response[] = array("nivel" => $estudante->estudanteUser->nivel);
            $response[] = array("regime" => $estudante->estudanteUser->regime); 
            
        }
        return response()->json($response);
    }


 
    public function create()
    {    
        $docentes = User::with('docenteUser')->where('is_docente', 1)->get();
        return view('admin.newdefesa', ['docentes' => $docentes]);
    }

    


    /**
     * Funcao para enviar dados de uma defesa para a base de dados.
     */
    public function store(Request $request)
    {
        $defesa = new Defesa();
        $defesa->foto = $request->foto;
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
        $defesa->id_estudante = $request->id_estudante;
        $defesa->save();
        $id_defesa = $defesa->id;

        $defdocente = new DefesaDocente();
        $defdocente->id_oponente = $request->id_oponente;
        $defdocente->id_presidente = $request->id_presidente;
        $defdocente->id_defesa = $id_defesa;

        if($defdocente->save()){
                return redirect()->route('defesaview')->with('Mensagem', 'Defesa registrada com sucesso!');
            } else{
                return redirect()->route('newdefesa')->with('Mensagem', 'Erro no registro da defesa!');
            }

    }


    /**
     * Funcao para vizualizar dados de uma defesa.
     */
    public function showAdmin($id)
    {
        $defesa = Defesa::findOrFail($id);
        return view('admin.showdefesa', ['defesa'=> $defesa]);
    }

    /**
     * Funcao para vizualizar dados de uma defesa.
     */
    public function showUser($id)
    {
        $defesa = Defesa::findOrFail($id);
        return view('usuario.showdefesa', ['defesa'=> $defesa]);
    }



    /**
     * Funcao para carregar o formulario para editar dados de uma defesa.
     */
    public function edit($id)
    {
        $defesa = Defesa::findOrFail($id);
        return view('admin.editdefesa', ['defesa' => $defesa]);
        
    }


    /**
     * Funcao para actualizar os dados na base de dados.
     */
    public function update(Request $request)
    {
      
      $defesa = Defesa::findOrFail($request->id)->update($request->all());

      if($defesa){

                return redirect()->route('defesaview')->with('msgSucessUpdate', 'Dados da defesa actualizados com sucesso!');

        } else{

                return redirect()->back()->with('msgErrorUpdate', 'Erro na actualizacao do dados da defesa!');

      }

    }


    /**
     * Funcao para eliminar uma defesa.
     */
    public function destroy($id)
    {
        Defesa::findOrFail($id)->delete();
        
        return redirect()->route('defesasview')->with('msgSucessDelete', 'Defesa eliminada com sucesso!');
     
    }
}
