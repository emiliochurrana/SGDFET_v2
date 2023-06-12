<?php

namespace App\Http\Controllers;

use App\Models\Defesa;
use App\Models\Estudante;
use App\Models\Galeria;
use Illuminate\Http\Request;
use App\Models\Monografia;
use App\Models\MonografiaDownload;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Smalot\PdfParser\Parser;

class MonoController extends Controller
{
    /**
     * Funcao para listar todas monografias publicadas.
     */
    public function index(){

       // $u = auth()->user();
       $search = request('search');

       if($search){
           $monografias = Monografia::where([
               ['autor', 'like', '%' .$search. '%']
           ])->get();
       }else{
        $monografias = Monografia::all();
       }
        return view('admin.monografiaview', ['monografias' => $monografias, 'search' => $search]);    
    }

    public function download($id){
        $mono = Monografia::findOrFail($id);
        $filePath = "ficheiros/estudantes/monografias/$mono->ficheiro";
        return response()->download($filePath);
    }

    /**
     * Funcao para pesquisar monografias publicadas (Estudantes).
     */
    public function monografia(){
            $search = request('search');

        if($search){
            $monografias = Monografia::where([
                ['tema', 'like', '%' .$search. '%']
            ])->get();
        }else{
            $monografias = Monografia::orderBy('id', 'desc')->limit(4)->get();
        }
        $defesa = Defesa::all();
        $monografia = Monografia::all();
        $galerias = Galeria::all();
        $estudante = User::all()->where('is_estudante', 1);
        $docente = User::all()->where('is_docente', 1);
        $drcurso = User::all()->where('is_drcurso', 1);
        return view('usuario.monografias', ['monografias' => $monografias, 'search' => $search,
        'monografia' => $monografia, 
        'defesa' => $defesa,
        'estudante' => $estudante,
        'docente' => $docente,
        'drcurso' => $drcurso,
        'galerias' => $galerias]);
    }



     /**
     * Funcao para pesquisar monografias publicadas (Administracao).
     */
  public function joinMonografia($id){
        $user = auth()->user();
        $user->monografiaDownload()->attach($id);
    }


    /**
     * Funcao para carregar formulario de cadastro de uma nova monografia.
     */
    public function retorna(Request $request){
        $search = $request->username;
        if($search == ''){
            return redirect()->back()->with(['msgInput' => 'Tens que preencher o campo do numero de estudante']);
            //$estudantes = User::orderby('name', 'asc')->where(['is_estudante' => 1])->select('id', 'name', 'username')->limit(1)->get();
        }else{
            $estudantes = User::with('estudanteUser')->orderby('name', 'asc')->select('id', 'name', 'username')
            ->where(['username'=> $search])->limit(1)->get();
        }

        foreach($estudantes as $estudante){
            $response['num_estudante'] = $estudante->estudanteUser->num_estudante;
            $response['id_estudante'] = $estudante->id;
            $response['name'] = $estudante->name;
            $response['curso'] = $estudante->estudanteUser->curso;
            $response['supervisor'] = $estudante->estudanteUser->supervisor;
            $response['nivel'] = $estudante->estudanteUser->nivel;
            $response['tema'] = $estudante->estudanteUser->tema;
            $response['foto'] = $estudante->estudanteUser->foto;
            $response['monografia'] = $estudante->dadoUser->monografia;
            $response['descricao'] = $estudante->defesaEstdante->resumo;
            
        }
        return response()->json($response);
    }
    public function create()
    {

        return view('admin.newmonografia');
    }

    /**
     * Funcao para enviar dados de uma monografia na base de dados.
     */
    public function storeMonografia(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'tema' => 'required',
                'curso' => 'required',
                'foto' => 'required',
                'descricao' => 'required',
                'nivel' => 'required',
                'supervisor' => 'required',
                'monografia' => 'required'
            ], 
            [
                'name.required' => 'O campo nome é obrigatório',
                'tema.required' => 'O campo tema é obrigatório',
                'curso.required' => 'O campo curso é obrigatório',
                'foto.required' => 'O campo foto é obrigatório',
                'descricao.required' => 'O campo resumo é obrigatório',
                'nivel.required' => 'O campo nivel é obrigatório',
                'supervisor.required' => 'O campo supervisor é obrigatório',
                'monografia.required' => 'O campo monografia é obrigatório'
            ]
            );
        $mono = new Monografia();
        $mono->id_estudante = $request->id_estudante;
        $mono->autor = $request->input('name');
        $name = Monografia::all()->where('id_estudante', '=', $mono->id_estudante)->count();
        if ($name > 0) {
            $add['success'] = false;
            $addMonografia['msgErrorName'] = 'Esta monografia já foi publicada';
            return redirect()->back()->with($addMonografia);
        }
        $mono->tema = $request->input('tema');
        $mono->curso = $request->input('curso');
        $mono->foto = $request->input('foto');
        $mono->resumo = $request->input('descricao');
        $mono->nivel = $request->input('nivel');
        $mono->supervisor = $request->input('supervisor');
        $mono->ficheiro =$request->input('monografia');
        
        if($mono->save()){

            return redirect()->route('monografiaview')->with(['msgSucessStore' => 'Monografia publicada com sucesso!']);
        }else{
            return redirect()->back()->with(['msgErrorStore' => 'Erro ao publicar a monografia!']);
        }
    }
    

    /**
     * Funcao para visualizar dados de uma monografia.
     */
    public function showAdmin(string $id)
    {
        $monografia = Monografia::findOrFail($id);
        return view('admin.showmonografia', ['monografia'=> $monografia]);
    }

        /**
     * Funcao para visualizar dados de uma monografia.
     */
    public function showAntes(string $id)
    {
        
        /*$parser = new Parser();
        $pdf = $parser->parseFile('../../ficheiros/estudantes/monografias/{{$monografias->ficheiro}}');
        $text = $pdf->getText();
        return nl2br($text);*/
        $monografias = Monografia::findOrFail($id);
        $defesa = Defesa::all();
        $monografia = Monografia::all();
        $galerias = Galeria::all();
        $estudante = User::all()->where('is_estudante', 1);
        $docente = User::all()->where('is_docente', 1);
        $drcurso = User::all()->where('is_drcurso', 1);
        return view('usuario.showmonografiantes', ['monografias'=> $monografias,
        'monografia' => $monografia,
        'estudante' => $estudante,
        'defesa' => $defesa,
        'docente' => $docente,
        'drcurso' => $drcurso,
        'galerias' => $galerias
        //'text' => $text
    ]);
    }

           /**
     * Funcao para visualizar dados de uma monografia.
     */
    public function showDepois(string $id)
    {
        /*$parser = new Parser();
        $pdf = $parser->parseFile('/ficheiros/estudantes/monografias/{{$monografias->ficheiro}}');
        $text = $pdf->getText();
        return nl2br($text);*/
        $monografias = Monografia::findOrFail($id);
        $defesa = Defesa::all();
        $monografia = Monografia::all();
        $galerias = Galeria::all();
        $estudante = User::all()->where('is_estudante', 1);
        $docente = User::all()->where('is_docente', 1);
        $drcurso = User::all()->where('is_drcurso', 1);
        return view('usuario.showmonografia', ['monografias'=> $monografias,
        'monografia' => $monografia,
        'estudante' => $estudante,
        'defesa' => $defesa,
        'docente' => $docente,
        'drcurso' => $drcurso,
        'galerias' => $galerias
        //'text' => $text
        ]);
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
        $monografia = Monografia::findOrFail($id);
        return view('admin.editmonografia', ['monografia' => $monografia]);
    }


    /**
     * Funcao para actualizar dados de uma monografia.
     */
    public function update(Request $request)
    {
        Monografia::findOrFail($request->id)->update($request->all());

        if($request->all()){

            return redirect()->route('monografiaview')->with(['msgSucessUpdate' => 'Dados da monografia actualizados com sucesso!']);
        }else{
            return redirect()->back()->with(['msgErrorUpdate' => 'Erro ao actualizar od dados da monografia!']);
        }
    }

    
    /**
     * Funcao para eliminar uma monografia.
     */
    public function destroy($id)
    {
        Monografia::findOrFail($id)->delete();
        
        return redirect()->route('monografiaview')->with(['msgSucessDelete' => 'Monografia eliminada com sucesso!']);
     
    }
}
