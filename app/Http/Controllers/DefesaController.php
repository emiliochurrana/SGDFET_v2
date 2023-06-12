<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Defesa;
use App\Models\Galeria;
use App\Models\DefesaParticipante;
use App\Models\Monografia;
use App\Models\User;
use Illuminate\Http\Response;

class DefesaController extends Controller
{
    /**
     * Funcao para listar todas defesas marcadas.
     */
    public function index()
    {
        $search = request('search');

        if($search){
            $defesas = Defesa::where([
                ['autor', 'like', '%' .$search. '%']
            ])->get();
        }else{
            $defesas = Defesa::all();
        }
        return view('admin.defesaview', ['defesas' => $defesas, 'search' => $search]);
    }

    public function joinDefesa($id){
        $user = auth()->user();
        $user->defesaParticipante()->attach($id);
        $defesa = Defesa::findOrFail($id);
        return redirect('/participacoes')->with(['msgParticipante' => 'Sua presença está confirmada na defesa '.$defesa->tema]);
    }
    public function leaveDefesa($id){
        $user = auth()->user();
        $user->defesaParticipante()->detach($id);
        $defesa = Defesa::findOrFail($id);
        return redirect('/participacoes')->with(['msgRemove' => 'Você saiu com sucesso da participação da defesa '.$defesa->tema]);

    }

    public function participacoes(){
        $user = auth()->user();
    
        $participante = $user->defesaParticipante;
        $defesa = Defesa::all();
        $monografia = Monografia::all();
        $galerias = Galeria::all();
        $estudante = User::all()->where('is_estudante', 1);
        $docente = User::all()->where('is_docente', 1);
        $drcurso = User::all()->where('is_drcurso', 1); 

        return view('usuario.participacoes', ['participante' => $participante,
        'defesa' => $defesa,
        'monografia' => $monografia,
        'estudante' => $estudante,
        'docente' => $docente,
        'drcurso' => $drcurso, 
        'galerias' => $galerias]);
    }

    public function participantes($id){
        $participantes = DefesaParticipante::all()->where('id_defesa',$id);
        $defesa = Defesa::all();
        $defesas = Defesa::all();
        $monografia = Monografia::all();
        $galerias = Galeria::all();
        $estudante = User::all()->where('is_estudante', 1);
        $docente = User::all()->where('is_docente', 1);
        $drcurso = User::all()->where('is_drcurso', 1);
        //$defesa = Defesa::where('id', $id)->first();
        //$participantes = User::where('id', $defesa->id_participante)->pluck('name')->first();
        return view('usuario.participantes', ['participantes' => $participantes, 'defesas' => $defesas,
        'defesa' => $defesa,
        'monografia' => $monografia,
        'estudante' => $estudante,
        'docente' => $docente,
        'drcurso' => $drcurso, 
        'galerias' => $galerias]);

    }
    /**
     * Funcao para pesquisa de defesas marcadas (estudantes).
     */ 
    public function defesa(){   
        $search = request('search');

        if($search){
            $defesas = Defesa::where([
                ['autor', 'like', '%' .$search. '%']
            ])->get();
        }else{
            $defesas = Defesa::orderBy('id', 'desc')->limit(4)->get();
        } 
        $defesa = Defesa::all();
        $monografia = Monografia::all();
        $galerias = Galeria::all();
        $estudante = User::all()->where('is_estudante', 1);
        $docente = User::all()->where('is_docente', 1);
        $drcurso = User::all()->where('is_drcurso', 1); 
        return view('usuario.defesas', ['defesas' => $defesas, 'search' => $search,
        'defesa' => $defesa,
        'monografia' => $monografia,
        'estudante' => $estudante,
        'docente' => $docente,
        'drcurso' => $drcurso,
        'galerias' => $galerias]);
    }
    /**
     * Funcao para carregar o formulario de cadastro de uma nova defesa.
     */
    public function retorna(Request $request){
        $search = $request->username;
        if($search == ''){
            $mensagem = with(['msgInput' => 'Tens que preencher o campo do numero de estudante']);
            return $mensagem;
            //$estudantes = User::orderby('name', 'asc')->where(['is_estudante' => 1])->select('id', 'name', 'username')->limit(1)->get();
        }else{
            $estudantes = User::with('estudanteUser')->orderby('name', 'asc')->select('id', 'name', 'username')
            ->where(['username'=> $search])->limit(1)->get();
        }
    
        //$response = array();
        foreach($estudantes as $estudante){
            // $response[] = array("num_estudante" => $estudante->estudanteUser->num_estudante);
            // $response[] = array("id_estudante" => $estudante->id);
            // $response[] = array("name" => $estudante->name);
            // $response[] = array("curso" => $estudante->estudanteUser->curso);
            // $response[] = array("supervisor" => $estudante->estudanteUser->supervisor); 
            // $response[] = array("nivel" => $estudante->estudanteUser->nivel);
            // $response[] = array("regime" => $estudante->estudanteUser->regime); 
            $response['num_estudante'] = $estudante->estudanteUser->num_estudante;
            $response['id_estudante'] = $estudante->id;
            $response['name'] = $estudante->name;
            $response['curso'] = $estudante->estudanteUser->curso;
            $response['supervisor'] = $estudante->estudanteUser->supervisor;
            $response['nivel'] = $estudante->estudanteUser->nivel;
            $response['regime'] = $estudante->estudanteUser->regime;
            $response['tema'] = $estudante->estudanteUser->tema;
            $response['foto'] = $estudante->estudanteUser->foto;
            if($estudante->dadoUser->monografia == ''){

                $response['monografia'] = 'Este estudante nao tem informacoes necessaria para poder marcar a defesa';

            }else{

                $response['monografia'] = $estudante->dadoUser->monografia;
                
            }
            
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
        $request->validate(
            [
                'foto' => 'required',
                'name' => 'required',
                'tema' => 'required',
                'curso' => 'required',
                'descricao' => 'required',
                'nivel' => 'required',
                'regime' => 'required',
                'supervisor' => 'required',
                'oponente' => 'required',
                'presidente' => 'required',
                'sala' => 'required',
                'data' => 'required',
                'hora' => 'required',
                'monografia' => 'required'
            ],
            [
                'foto.required' => 'Campo foto é obrigatório',
                'name.required' => 'Campo nome é obrigatório',
                'tema.required' => 'Campo tema é obrigatório',
                'curso.required' => 'Campo curso é obrigatório',
                'descricao.required' => 'Campo resumo é obrigatório',
                'nivel.required' => 'campo nivel é obrigatório',
                'regime.required' => 'Campo regime é obrigatório',
                'supervisor.required' => 'Campo supervisor é obrigatório',
                'oponente.required' => 'Campo oponente é obrigatório',
                'presidente.required' => 'Campo presidente é obrigatório',
                'sala.required' => 'Campo sala é obrigatório',
                'data.required' => 'Campo data é obrigatório',
                'hora.required' => 'Campo hora é obrigatório',
                'monografia.required' => 'Este estudante não possi documentos necessarios para a marcacao da defesa'
            ]
        );
        $defesa = new Defesa();
        $defesa->id_estudante = $request->id_estudante;
        $defesa->foto = $request->foto;
        $defesa->autor = $request->input('name');
        $name = Defesa::all()->where('id_estudante', '=', $defesa->id_estudante)->count();
        if ($name > 0) {
            $add['success'] = false;
            $addMonografia['msgErrorName'] = 'Este estudante já tem uma defesa marcada';
            return redirect()->back()->with($addMonografia);
        }
        $defesa->tema = $request->input('tema');
        $defesa->curso = $request->input('curso');
        $defesa->resumo = $request->input('descricao');
        $defesa->nivel = $request->input('nivel');
        $defesa->regime = $request->input('regime');
        $defesa->supervisor =$request->input('supervisor');
        $defesa->oponente = $request->input('oponente');
        $defesa->presidente = $request->input('presidente');
        $defesa->sala = $request->input('sala');
        $defesa->data = $request->input('data');
        $defesa->hora = $request->input('hora');
        $defesa->monografia = $request->input('monografia');  
        if($defesa->save()){
                return redirect()->route('defesasview')->with('msgSucessStore', 'Defesa registrada com sucesso!');
            } else{
                return redirect()->back()->with('msgErrorStore', 'Erro no registro da defesa!');
            }

    }


    /**
     * Funcao para vizualizar dados de uma defesa.
     */
    public function showAdmin($id)
    {
        $defesas = Defesa::findOrFail($id);
        return view('admin.showdefesas', ['defesas'=> $defesas]);
    }

    /**
     * Funcao para vizualizar dados de uma defesa.
     */
    public function showAntes($id)
    {
        $defesas = Defesa::findOrFail($id);
        $defesa = Defesa::all();
        $monografia = Monografia::all();
        $galerias = Galeria::all();
        $estudante = User::all()->where('is_estudante', 1);
        $docente = User::all()->where('is_docente', 1);
        $drcurso = User::all()->where('is_drcurso', 1); 
        return view('usuario.showdefesantes', ['defesas'=> $defesas,
        'defesa' => $defesa,
        'monografia' => $monografia,
        'estudante' => $estudante,
        'docente' => $docente,
        'drcurso' => $drcurso,
        'galerias' => $galerias]);
    }

     /**
     * Funcao para vizualizar dados de uma defesa.
     */
    public function showDepois($id)
    {
        $defesas = Defesa::findOrFail($id);
        $defesa = Defesa::all();
        $monografia = Monografia::all();
        $galerias = Galeria::all();
        $estudante = User::all()->where('is_estudante', 1);
        $docente = User::all()->where('is_docente', 1);
        $drcurso = User::all()->where('is_drcurso', 1); 
        return view('usuario.showdefesas', ['defesas'=> $defesas,
        'defesa' => $defesa,
        'monografia' => $monografia,
        'estudante' => $estudante,
        'docente' => $docente,
        'drcurso' => $drcurso,
        'galerias' => $galerias]);
    }



    /**
     * Funcao para carregar o formulario para editar dados de uma defesa.
     */
    public function edit($id)
    {
        $defesa = Defesa::findOrFail($id);
        $docentes = User::with('docenteUser')->where('is_docente', 1)->get();
        return view('admin.editdefesa', ['defesa' => $defesa, 'docentes' => $docentes]);
        
    }


    /**
     * Funcao para actualizar os dados na base de dados.
     */
    public function update(Request $request)
    {
      
      $defesa = Defesa::findOrFail($request->id)->update($request->all());

      if($defesa){

                return redirect()->route('defesasview')->with('msgSucessUpdate', 'Dados da defesa actualizados com sucesso!');

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
