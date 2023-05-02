<?php

namespace App\Http\Controllers;

use App\Models\Galeria;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NoticiasController extends Controller
{
    /**
     * Funcao para trazer todas noticia.
     */
    public function index()
    {
        $noticias = Noticia::all();

        return view('admin.noticiaview', ['noticias' => $noticias]);
    }

    public function indexNoticia()
    {
        $noticias = Noticia::all();
        $galerias = Galeria::all();

        return view('usuario.inicio', ['noticias' => $noticias, 'galerias' => $galerias]);
    }




    /**
     * Funcao para carregar formulario de cadastro de uma noticia.
     */
    public function create()
    {
        return view('');
    }



    /**
     * SFuncao para salvar dadop de uma noticia.
     */
    public function store(Request $request)
    {
        $noticia = new Noticia();
        //upload de foto 
        if($request->hasFile('foto') && $request->file('foto')->isValid()){

            $requestImage = $request->foto;

            $extension = $requestImage->extension();

            $imageName=md5($requestImage->foto->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request->foto->move(public_path('ficheiros/noticias'), $imageName);

            $noticia->foto = $imageName;
        }

        $noticia->titulo = $request->input('titulo');
        $noticia->descricao = $request->input('descricao');
        $noticia->data = $request->input('data');
        $noticia->link = $request->input('link');

        if($noticia->save()){

            return redirect()->route('noticiaview')->with(['Mensagem' => 'Galeria cadastrada com sucesso'], Response::HTTP_OK);
        
        }else{
            return redirect()->route('newgaleria')->with(['Mensagem' => 'Erro ao cadastrar galeria'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }



    /**
     * Funcao para trazer dados de uma noticia.
     */
    public function show($id)
    {
        $noticias = Noticia::findOrFail($id);
        return view('admin.shownoticia', ['noticias' => $noticias]);
    }



    /**
     * Funcao para carregar formulario para editar dados de uma noticia.
     */
    public function edit($id)
    {
        $noticias = Noticia::findOrFail($id);
        return view('admin.editnoticia', ['noticias' => $noticias]);
    }



    /**
     * Funcao para actualizar dados de uma noticia.
     */
    public function update(Request $request)
    {
        $data = $request->all();
        //$user = auth()->user();
        //$data['id_drcurso'] = $user->id;
        if($request->hasFile('foto') && $request->file('foto')->isValid()){

            $requestImage = $request->foto;

            $extension = $requestImage->extension();

            $imageName=md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('ficheiros/noticias'), $imageName);

            $data['foto'] = $imageName;
        }
        $noticia = Noticia::findOrFail($request->id)->update($data);
        
        if($noticia){
            return redirect()->route('noticiaview')->with(['msgSucessUpdate' => 'Noticia actualizada com sucesso!'], Response::HTTP_OK);
        }else{
            return redirect()->back()->with(['msgErrorUpdate' => 'Erro ao actualizar a noticia!'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }



    /**
     * Funcao para eliminar uma noticia.
     */
    public function destroy($id)
    {
        
        Noticia::findOrFail($id)->delete();
        return redirect()->route('noticiaview')->with(['msg' => 'Noticia actualizada com sucesso!'], Response::HTTP_OK);
        
    }
}
