<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
    }

    //----------------------Listar todos estudantes ---------------------------------------
    public function listEstudantes(User $utilizador){
        return view('listEstudantes', ['user' => $utilizador]);
    }

    //----------------------------Listar todos docentes-----------------------------------------
    public function listDocentes(User $utilizador){
        return view('listDocentes', ['user' => $utilizador]);
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
    }

    //-----------------------------------cadsatro do estudante ----------------------------------------------
    public function formAddEstudante(){

        return view('newestudante');
    }
    public function storeEstudante(Request $request)
    {
        $utilizador = new User();
        $utilizador->name = $request->input('name');
        $utilizador->email = $request->input('email');
        $utilizador->num_estudante = $request->input('num_estudante');
        $utilizador->regime = $request->input('regime');
        $utilizador->ano_ingresso=$request->input('ano_ingresso');
        $utilizador->supervisor=$request->input('supervisor');
        $utilizador->curso=$request->input('curso');
        $utilizador->username = $request->input('username');
        $utilizador->password = Hash::make($request->input('password'));
        $utilizador->is_active = $request->input('is_active');
        $utilizador->is_estudante->input('is_estudante');
        $email = User::all()->where('email','=',$utilizador->email)->count();
        if($email > 0){
            $addEstudante['success'] = false;
            $addEstudante['mensagem'] = 'Esse email já esta registado no sistema.';
            return response()->json($addEstudante);    
        }
        if($utilizador->save()){
            $addEstudante['mensagem'] = 'Estudante cadastrado com sucesso';
            $addEstudante['success'] = true;
            return response()->json($addEstudante, Response::HTTP_OK);
        }
        $addEstudante['mensagem'] = 'Houve um problema no seu registo.';
        $addEstudante['success'] = false;
        return response()->json($addEstudante, Response::HTTP_INTERNAL_SERVER_ERROR);

        return redirect()->route('users.estudanteview');
    
    
    }

    //-------------------------------------------------Cadastro de docente---------------------------------
    public function formAddDocente(){
        return view('newdocente');
    }

    public function storeDocente(Request $request){
        $utilizador = new User();
        $utilizador->name = $request->input('name');
        $utilizador->email = $request->input('email');
        $utilizador->username = $request->input('username');
        $utilizador->password = Hash::make($request->input('password'));
        $utilizador->is_active = $request->input('is_active');
        $utilizador->is_docente = $request->input('is_docente');
        $utilizador->is_admin = $request->input('is_admin');

        if($utilizador->save()){
            $addDocente['mensagem'] = 'Docente cadastrado com sucesso';
            $addDocente['success'] = true;
            return response()->json($addDocente, Response::HTTP_OK);

        }
        $addDocente['mensagem'] = 'Houve um problema no seu registo.';
        $addDocente['success'] = false;
        return response()->json($addDocente, Response::HTTP_INTERNAL_SERVER_ERROR);
        return redirect()->route('users.docenteview');

    }

//----------------------------------Cadastro do administrador do sistema --------------------------------------
public function storeAdmin(Request $requaest){
    $utilizador = new User();
    $utilizador->name = 'Administrador';
    $utilizador->username= 'admin';
    $utilizador->email = 'secreto.admin@gmail.com';
    $utilizador->password = Hash::make('admin');
    $utilizador->is_active='1';
    $utilizador->is_admin = '1';
    //$utilizador->verification_code = sha1(time());
    $utilizador->is_verified = 1;
    $utilizador->user_img = '';
    if($utilizador->save()){
        return response()->json(['Mensagem' => 'Administrador registado com sucesso'], Response::HTTP_OK);
    } else{
        return response()->json(['Mensagem' => 'Deu merda.'], Response::HTTP_INTERNAL_SERVER_ERROR);
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

    //--------------------------------Editar dados do estudante------------------------------- 
    public function formEditEstudante(User $utilizador){
        return view('editestudante', ['user' => $utilizador]);
    }

    public function editEstudante(User $utilizador, Request $request){

        $utilizador->name = $request->input('name');

        if(filter_var($request->email, FILTER_VALIDATE_EMAIL)){

            $utilizador->email = $request->input('email');
        }
        $utilizador->num_estudante = $request->input('num_estudante');
        $utilizador->regime = $request->input('regime');
        $utilizador->ano_ingresso=$request->input('ano_ingresso');
        $utilizador->supervisor=$request->input('supervisor');
        $utilizador->curso=$request->input('curso');
        $utilizador->username = $request->input('username');
        if(empty($request->password)){

            $utilizador->password = Hash::make($request->input('password'));

        }
    
        $utilizador->is_active = $request->input('is_active');
        $utilizador->is_estudante->input('is_estudante');

        if($utilizador->save()){
            return response()->json(['Mensagem' => 'Dados do estudante actualizados com sucesso'], Response::HTTP_OK);
        } else{
            return response()->json(['Mensagem' => 'Erro na actualizacao de dados.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        return redirect()->route('users.estudanteview');

    }

    //----------------------Editar dados do docente------------------------------------------------ 

    public function formEditDocente(User $utilizador){

        return view('editdocente', ['user' => $utilizador]);

    }

    public function editDocente(User $utilizador, Request $request){

        $utilizador->name = $request->input('name');
        if(filter_var($request->email, FILTER_VALIDATE_EMAIL)){

            $utilizador->email = $request->input('email');
        }
       
        $utilizador->username = $request->input('username');

        if(empty($request->password)){

            $utilizador->password = Hash::make($request->input('password'));
        }
        
        $utilizador->is_active = $request->input('is_active');
        $utilizador->is_docente = $request->input('is_docente');
        $utilizador->is_admin = $request->input('is_admin');

        if($utilizador->save()){
            return response()->json(['Mensagem' => 'Dados do docente actualizados com sucesso'], Response::HTTP_OK);
        } else{
            return response()->json(['Mensagem' => 'Erro na actualizacao de dados.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        return redirect()->route('users.docenteview');

    }
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

     public function destroyEstudante(User $utilizador){
            if($utilizador->delete()){
                return response()->json(['Mensagem' => 'Estudante eliminado com sucesso'], Response::HTTP_OK);
        } else{
            return response()->json(['Mensagem' => 'Erro nao eliminar o estudante.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
            return redirect()->route('users.estudanteview');

     }

     public function destroyDocente(User $utilizador){
        if($utilizador->delete()){
        return response()->json(['Mensagem' => 'Docente eliminado com sucesso'], Response::HTTP_OK);
        } else{
            return response()->json(['Mensagem' => 'Erro ao elimnar o docente.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        return redirect()->route('users.docenteview');
     }
    public function destroy(string $id)
    {
        //
    }
}
