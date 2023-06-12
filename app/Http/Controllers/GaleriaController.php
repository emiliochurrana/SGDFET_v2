<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Defesa;
use Illuminate\Http\Request;
use App\Models\Galeria;
use App\Models\Monografia;
use App\Models\User;
use Illuminate\Http\Response;

class GaleriaController extends Controller
{
    /**
     * Funcao para listar todos dados da galeria.
     */
    public function index()
    {
        $search = request('search');

        if($search){
            $galerias = Galeria::where([
                ['titulo', 'like', '%' .$search. '%']
            ])->get();
        }else{
        $galerias = Galeria::all();
        }
        return view('admin.galeria', ['galerias' => $galerias, 'search' => $search]);
    }

    /**
     * Funcao para carregar o formulario de cadastro da galeria.
     */
    public function create()
    {
        return view('');
    }

    /**
     * Funcao para salvar dados da galeria.
     */
    public function store(Request $request)
    {
        //
        $galeria = new Galeria();
        
        //upload de foto 
        if($request->hasFile('foto') && $request->file('foto')->isValid()){

            $requestImage = $request->foto;

            $extension = $requestImage->extension();

            $imageName=md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request->foto->move(public_path('ficheiros/galeria'), $imageName);

            $galeria->foto = $imageName;
        }

        $galeria->titulo = $request->input('titulo');
        $galeria->data = $request->input('data');
        
        $galeria->descricao = $request->input('descricao');


        if($galeria->save()){
            return redirect()->route('galeriaview')->with(['Mensagem' => 'Galeria cadastrada com sucesso!'], Response::HTTP_OK);
        }else{
            return redirect()->route('newgaleria')->with(['Mensagem' => 'Erro ao cadastrar galeria!'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    /**
     * Funcao para visualizar dados da galeria.
     */
    public function show($id)
    {
        $galeria = Galeria::findOrFail($id);
        return view('admin.showgaleria', ['galeria' => $galeria]);
    }

        /**
     * Funcao para visualizar dados da galeria.
     */
    public function showAntes($id)
    {
        $galeria = Galeria::findOrFail($id);
        $defesa = Defesa::all();
        $monografia = Monografia::all();
        $galerias = Galeria::all();
        $estudante = User::all()->where('is_estudante', 1);
        $docente = User::all()->where('is_docente', 1);
        $drcurso = User::all()->where('is_drcurso', 1); 
        return view('usuario.showgaleriantes', ['galeria' => $galeria,
        'defesa' => $defesa,
        'monografia' => $monografia,
        'estudante' => $estudante,
        'docente' => $docente,
        'drcurso' => $drcurso,
        'galerias' => $galerias]);
    }

        /**
     * Funcao para visualizar dados da galeria.
     */
    public function showDepois($id)
    {
        $galeria = Galeria::findOrFail($id);
        $defesa = Defesa::all();
        $monografia = Monografia::all();
        $galerias = Galeria::all();
        $estudante = User::all()->where('is_estudante', 1);
        $docente = User::all()->where('is_docente', 1);
        $drcurso = User::all()->where('is_drcurso', 1); 
        return view('usuario.showgaleria', ['galeria' => $galeria,
        'defesa' => $defesa,
        'monografia' => $monografia,
        'estudante' => $estudante,
        'docente' => $docente,
        'drcurso' => $drcurso,
        'galerias' => $galerias]);
    }

    /**
     * Funcao para carregar o formulario para editar dados da galeria.
     */
    public function edit($id)
    {
        $galeria = Galeria::findOrFail($id);
        return view('admin.editgaleria', ['galeria' => $galeria]);
    }

    /**
     * Funcao para actualizar dados da galeria.
     */
    public function update(Request $request)
    { 
        $data = $request->all();
        $requestid =$request->id_drcurso;
        $data['id_drcurso'] = $requestid;
        //upload de foto 
        if($request->hasFile('foto') && $request->file('foto')->isValid()){

            $requestImage = $request->foto;

            $extension = $requestImage->extension();

            $imageName=md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('ficheiros/galeria'), $imageName);

            $data['foto'] = $imageName;
        }
        $galeria = Galeria::findOrFail($request->id)->update($data);
        if($galeria){

            return redirect()->route('galeriaview')->with(['msgSucessUpdate' => 'Galeria actualizada com sucesso!'], Response::HTTP_OK);
        }else{
            return redirect()->route('editgaleria')->with(['msgErrorUpdate' => 'Erro ao actualizar a galeria!'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Funcao para eliminar dados da galeria.
     */
    public function destroy(string $id)
    {
        Galeria::findOrFail($id)->delete();

        return redirect()->route('galeriaview')->with(['Mensagem' => 'Galeria eliminada com sucesso!'], Response::HTTP_OK);
    }
}
