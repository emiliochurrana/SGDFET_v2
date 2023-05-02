<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\DadosDefesa;
use App\Models\Estudante;
use App\Models\User;
use Nette\Utils\Html;
use PHPUnit\Framework\Attributes\RequiresMethod;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Html as ReportHtml;
use Symfony\Contracts\Service\Attribute\Required;

class DadosController extends Controller
{
    /**
     * Funcao para trazer toda lista de dados de defesa
     */
    public function index()
    {
        //
        $dados = DadosDefesa::all();
        return view('dadosview', ['defesas' => $dados]);

    }


    /**
     * Funcao para pesquisa de dados de defesas
     */
    public function pesquisa(){

        $search = request('search');

        if($search){
            $dados = DadosDefesa::where([
                ['nome', 'like', '%', $search. '%']
            ])->get();
        }
        return view('dadosview', ['dados' => $dados, 'search' => $search]);

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('newdado');
    }


    /**
     * Funcao para envio de dados de cadsatro na base de dados.
     */
    public function store(Request $request)
    {
        //
            $dados = new DadosDefesa();
            $user = auth()->user();
            $dados->name = $user->name;
            $dados->id_estudante = $user->id;
            //upload da declarcao de nota 
            $bi = $request->bi;
            if($bi == ""){
                return redirect()->with(['msgErrorBi' => 'O campo Bi esta vazio']);
            }else{
                if($request->hasFile('bi') && $request->file('bi')->isValid()){

                    $requestBi = $request->bi;

                    $extension = $requestBi->extension();

                    $biName=md5($requestBi->getClientOriginalName() . strtotime("now")) . "." . $extension;

                    $requestBi->move(public_path('ficheiros/estudantes/bi'), $biName);

                    $dados->bi = $biName;
                }
            }

            //upload da declarcao de nota 
            $declaracao = $request->declaracao_nota;
            if($declaracao == ""){
                return back()->with(['msgErrorDeclaracao' => 'O campo declaracao esta vazio']);
            }else{
                if($request->hasFile('declaracao_nota') && $request->file('declaracao_nota')->isValid()){

                    $requestDeclaracao = $request->declaracao_nota;

                    $extension = $requestDeclaracao->extension();

                    $declaracaoName=md5($requestDeclaracao->getClientOriginalName() . strtotime("now")) . "." . $extension;

                    $requestDeclaracao->move(public_path('ficheiros/estudantes/declaracoes'), $declaracaoName);

                    $dados->declaracao_nota = $declaracaoName;
                }
            }

            //upload da monografia 
            $monografia = $request->monografia;
            if($monografia == ""){

                return back()->with(['msgErrorMonografia' => 'O campo monografia esta vazio']);
            }else{
                if($request->hasFile('monografia') && $request->file('monografia')->isValid()){

                    $requestMonografia = $request->monografia;

                    $extension = $requestMonografia->extension();

                    $monografiaName=md5($requestMonografia->getClientOriginalName() . strtotime("now")) . "." . $extension;

                    $requestMonografia->move(public_path('ficheiros/estudantes/monografias'), $monografiaName);

                    $dados->monografia = $monografiaName;
                }
            }

            //upload de curriculum 
            $curriculum = $request->curriculum;
            if($curriculum == ""){
                return back()->with(['msgErrorCurriculum' => 'O campo curriculum esta vazio']);
            }else{
                if($request->hasFile('curriculum') && $request->file('curriculum')->isValid()){

                    $requestCurriculum = $request->curriculum;

                    $extension = $requestCurriculum->extension();

                    $curriculumName=md5($requestCurriculum->getClientOriginalName() . strtotime("now")) . "." . $extension;

                    $requestCurriculum->move(public_path('ficheiros/estudantes/curriculum'), $curriculumName);

                    $dados->curriculum = $curriculumName;
                }
            }
            
            if($dados->save()){
                return redirect()->back()->with(['Mensagem' => 'Dados enviados com sucesso'], Response::HTTP_OK);
            }else{
                return redirect()->back()->with(['Mensagem' => 'Ja possui dados no sistema'], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
    }


    /**
     * Funcao para viazualizar dados de defesa de um usuarios .
     */
    public function show($id)
    {
       //
      // $dados = Estudante::findOrFail($id);
       //$dados = $estudante->dados()->get();
      // return view('admin.', ['dados' => $dados]);
   
    }


    /**
     * Funcao para carregar o formilario para editar dados.
     */
    public function edit($id)
    {
        //
       /* $user = User::findOrFail($id);
        $dados = $user->dadoUser()->get();
        return view('usuario.editperfilestudante', ['dados' => $dados]);*/
    }


    /**
     * Funcao para carregar os dados de actualizacao.
     */
    public function update(Request $request)
    {
        //
        $data = $request->all();

                    //upload da declarcao de bi

                    if($request->hasFile('bi') && $request->file('bi')->isValid()){

                        $requestBi = $request->bi;
        
                        $extension = $requestBi->extension();
        
                        $biName=md5($requestBi->bi->getClientOriginalName() . strtotime("now")) . "." . $extension;
        
                        $request->bi->move(public_path('ficheiros/estudantes/bi'), $biName);
        
                        $data['bi'] = $biName;
                    }

            //upload da declarcao de nota 

            if($request->hasFile('declaracao_nota') && $request->file('declaracao_nota')->isValid()){

                $requestDeclaracao = $request->declaracao_nota;

                $extension = $requestDeclaracao->extension();

                $declaracaoName=md5($requestDeclaracao->declaracao_nota->getClientOriginalName() . strtotime("now")) . "." . $extension;

                $request->declaracao_nota->move(public_path('ficheiros/estudantes/declaracoes'), $declaracaoName);

                $data['declaracao_nota'] = $declaracaoName;
            }
                

            //upload da monografia 
            if($request->hasFile('monografia') && $request->file('monografia')->isValid()){

                $requestMonografia = $request->monografia;

                $extension = $requestMonografia->extension();

                $monografiaName=md5($requestMonografia->monografia->getClientOriginalName() . strtotime("now")) . "." . $extension;

                $request->monografia->move(public_path('ficheiros/estudantes/monografias'), $monografiaName);

                $ddata['monografia'] = $monografiaName;
            }

            //upload de curriculum 
            if($request->hasFile('curriculum') && $request->file('curriculum')->isValid()){

                $requestCurriculum = $request->curriculum;

                $extension = $requestCurriculum->extension();

                $curriculumName=md5($requestCurriculum->curriculum->getClientOriginalName() . strtotime("now")) . "." . $extension;

                $request->curriculum->move(public_path('ficheiros/estudantes/curriculum'), $curriculumName);

                $data['curriculum'] = $curriculumName;
            }

            //DadosDefesa::findOrFail($request->id)->update($data);

       /* if($request->all()){
            return redirect()->route('/perfil')->with(['Mensagem' => 'Dados actualizados com sucesso'], Response::HTTP_OK);
        }else{
            return redirect()->route('/')->with(['Mensagem' => 'Erro ao actualizar os dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }*/
    }


    /**
     * Funcao para eliminar dados.
     */
    public function destroy($id)
    {
        //
        DadosDefesa::findOrFail($id)->delete();
        
    //return redirect()->route('dadosview')->with(['Mensagem' => 'Dados eliminados com sucesso!'], Response::HTTP_OK);
     
    }
}
