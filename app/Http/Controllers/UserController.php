<?php

namespace App\Http\Controllers;

use App\Models\DadosDefesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Docente;
use App\Models\Drcurso;
use App\Models\Estudante;
use App\Models\EstudanteDocente;
use App\Models\UserDocente;
use App\Models\UserDrcurso;
use App\Models\UserEstudante;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //public $is_active = '0';
    //public $is_docente ='0';

    public function dashboard()
    {

        $admin = User::where('is_admin', 1)->get();

        return view('admin.dashboard', ['admin' => $admin]);
    }

    public function dashboardDocente()
    {

        $docente = User::where('is_docente', 1)->get();

        return view('admin.dashboardocente', ['docente' => $docente]);
    }

    public function dashboardDrcurso()
    {

        $drcurso = User::where('is_drcurso', 1)->get();

        return view('admin.dashboardrcurso', ['drcurso' => $drcurso]);
    }

    /**
     * --------------------------------------------------------------------------------------------------------------------------------
     * --------------------------------------------Estudante---------------------------------------------------------------------------
     * --------------------------------------------------------------------------------------------------------------------------------
     */
    /**
     * Funcao para listar todos estudantes.
     */
    public function indexEstudantes()
    {

        $userauth = auth()->user();

        $estudantes = $userauth->estudanteDocente;
        //$estudantesUser = $user->estudanteUser;
        //$estudantes = User::with('estudanteDocente')->where(['is_estudante' => 1])->get();
        return view('admin.estudantesview', ['estudantes' => $estudantes]);
    }

    public function indexEstudante()
    {
        $estudantes = User::with('estudanteUser')->where(['is_estudante' => 1])->get();
        return view('admin.estudantesview', ['estudantes' => $estudantes]);
    }

    /**
     * Funcao para pesquisa de estudantes 
     */
    public function searchEstudante()
    {

        $search = request('search');

        if ($search) {
            $estudantes = User::with('estudanteUser')->where([
                'is_estudante', 1, ['name', 'like', '%', $search . '%']
            ])->get();
        }
        return view('admin.estudanteview', ['estudantes' => $estudantes, 'search' => $search]);
    }
    /**
     * Funcao para carregar o formulario de cadastro de um estudante .
     */
    public function createEstudante()
    {
        //
        return view('admin.newestudante');
    }

    public function perfilEstudante($id)
    {
        $user = User::findOrFail($id);
        $estudantes = $user->estudanteUser()->get();
        $dados = $user->dadoUser()->get();
        return view('usuario.perfilestudante', ['estudantes' => $estudantes, 'dados' => $dados]);
    }


    /**
     * Funcao para salvar dados de cadsatro de um do estudante na base de dados.
     */
    public function storeEstudante(Request $request)
    {
        //$this->is_active = '0';
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $confirPass = $request->confirm_password;
        $pass = $request->password;
        $active = $request->is_active;
        if ($pass == $confirPass) {
            if (strlen($pass) >= 6) {
                $user->password = Hash::make($request->password);
            } else {
                return redirect()->back()->with(['msgErrorPass' => 'A palavra passe tem ter no minimo 6 digitos']);
            }
        } else {
            return redirect()->back()->with(['msgPass' => 'A palavra passe nao coincide']);
        }
        if ($active == '1') {
            $user->is_active = $request->input('is_active');
        } else {
            $user->is_active = '0';
        }
        $user->is_estudante = '1';
        $user->is_docente = '0';
        $user->is_admin = '0';
        $user->is_drcurso = '0';
        $user->username = $request->num_estudante;
        $email = User::all()->where('email', '=', $user->email)->count();
        if ($email > 0) {
            $addEstudante['success'] = false;
            $addEstudante['mensagem'] = 'Esse email já esta registado no sistema.';
            return response()->json($addEstudante);
        }
        $user->save();
        $id_user = $user->id;

        $estudante = new Estudante();
        $estudante->num_estudante = $request->input('num_estudante');
        $estudante->regime = $request->input('regime');
        // upload de foto 
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {

            $requestImage = $request->foto;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('ficheiros/estudantes/fotos'), $imageName);

            $estudante->foto = $imageName;
        }
        $estudante->ano_ingresso = $request->input('ano_ingresso');
        $estudante->supervisor = $request->input('supervisor');
        $estudante->curso = $request->input('curso');
        $userauth = auth()->user();
        $estudante->id_docente = $userauth->id;
        $estudante->id_user = $id_user;
        ///$utilizador->save();
        //$id_utilizador = $utilizador->id;

        /* $estudante = new UserEstudante();
                $estudante->id_user = $id_user;
                $estudante->id_estudante = $id_utilizador;*/

        if ($estudante->save()) {

            return redirect()->route('estudanteview')->with(['msgSucessStore' => 'Estudante cadastrado com sucesso!']);
        } else {
            return redirect()->back()->with(['msgErrorStore' => 'Erro no cadastro do estudante!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function showEstudante($id)
    {
        //
        $user = User::findOrFail($id);
        $estudantes = $user->estudanteUser()->get();
        $dados = $user->dadoUser()->get();
        return view('admin.showestudante', ['estudantes' => $estudantes, 'dados' => $dados]);
    }

    /**
     * Funcao para carregar o formulario para editar dados de um estudante.
     */
    public function editEstudante($id)
    {

        $user = User::findOrFail($id);
        $estudantes = $user->estudanteUser()->get();
        $dados = $user->dadoUser()->get();
        return view('admin.editestudante', ['estudantes' => $estudantes, 'dados' => $dados]);
    }

    public function updateEstudante(Request $request)
    {
        $user = User::findOrFail($request->id);
        $estudante = $user->estudanteUser;
        $userPassword = $user->password;
        $active = $request->is_active;

        if ($request->password_actual != "") {

            $newPass = $request->password;
            $confirPass = $request->confirm_password;
            $name = $request->name;
            $email = $request->email;
            $username = $request->username;
            $curso = $request->curso;
            $is_active = $request->is_active;

            if (Hash::check($request->password_actual, $userPassword)) {
                if ($newPass == $confirPass) {
                    if (strlen($newPass) >= 6) {
                        $user->password = Hash::make($request->password);
                        DB::table('users')
                            ->where('id', $user->id)
                            ->update(['password' => $user->password]);

                        $data = $request->all('name', 'email', 'username');
                        $foto = $request->all('foto');
                        
                        if ($active == '1') {
                            $is_active = $request->all('is_active');
                            $user->update($is_active);
                        } else {
                            $user->is_active = '0';
                        }
                        // upload de foto 
                        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {

                            $requestImage = $request->foto;

                            $extension = $requestImage->extension();

                            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

                            $requestImage->move(public_path('ficheiros/estudantes/fotos'), $imageName);

                            $foto['foto'] = $imageName;
                            $estudante->update($foto);
                        }
                        $user->update($data);
                        DB::table('estudantes')->where('id', $estudante->id)->update(['curso' => $curso]);

                        return redirect()->route('estudanteview')->with(['msgSucessUpdate' => 'A palavra passe foi combinada correctamente']);
                    } else {
                        return redirect()->back()->with(['msgErrorUpdate' => 'A palavra passe deve ter mais de 6 digitos']);
                    }
                } else {
                    return redirect()->back()->with(['msgIncorrecta' => 'Por favor verifique a palavra passe não coincide']);
                }
            } else {
                return redirect()->back()->with(['password_actual' => 'A palavra passe actual não coincide']);
            }
        } else {
            $curso = $request->curso;
            $foto = $request->all('foto');
            $data = $request->all('name', 'email', 'username', 'foto');
            if ($active == '1') {
                $is_active = $request->all('is_active');
                $user->update($is_active);
            } else{
                $user->is_active = '0';   
            }
            

            // upload de foto 
            if ($request->hasFile('foto') && $request->file('foto')->isValid()) {

                $requestImage = $request->foto;

                $extension = $requestImage->extension();

                $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

                $requestImage->move(public_path('ficheiros/estudantes/fotos'), $imageName);

                $foto['foto'] = $imageName;
                $estudante->update($foto);
            }
            DB::table('estudantes')->where('id', $estudante->id)->update(['curso' => $curso]);

            $user->update($data);

            return redirect()->route('estudanteview')->with(['msgSucess' => 'Dados actualizados com sucesso']);
        }
        return redirect()->back()->with(['msgError' => 'Erro ao actualizar os dados']);
    }

    public function editPerfilEstudante($id)
    {

        $user = User::findOrFail($id);
        $estudantes = $user->estudanteUser()->get();
        $dados = $user->dadoUser()->get();
        return view('usuario.editperfilestudante', ['estudantes' => $estudantes, 'dados' => $dados]);
    }


    public function updatePerfilEstudante(Request $request)
    {

        $user = auth()->user();
        $estudante = $user->estudanteUser;
        $dado = $user->dadoUser;
        $userPassword = $user->password;

        if ($request->password_actual != "") {
            $newPass = $request->password;
            $confirPass = $request->confirm_password;
            $name = $request->name;
            $email = $request->email;
            $username = $request->username;
            $curso = $request->curso;
            $ano = $request->ano_ingresso;
            $regime = $request->regime;
            $num_estudante =$request->num_estudante;
        
        if(Hash::check($request->password_actual, $userPassword)){

            if($newPass == $confirPass){
                if(strlen($newPass) >= 6){
                    $user->password = Hash::make($request->password);
                    DB::table('users')->where('id', $user->id)->update(['password' => $user->password]); 
                    DB::table('users')->where('id', $user->id)->update(['name' => $name]);
                    DB::table('users')->where('id', $user->id)->update(['email' => $email]);
                    DB::table('users')->where('id', $user->id)->update(['username' => $username]);
                     // upload de foto 
                     if ($request->hasFile('foto') && $request->file('foto')->isValid()) {

                        $requestImage = $request->foto;

                        $extension = $requestImage->extension();

                        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

                        $requestImage->move(public_path('ficheiros/estudantes/fotos'), $imageName);

                        $foto = $imageName;
                        DB::table('estudantes')->where('id', $estudante->id)->update(['foto' => $foto]);
                    }
                     // upload de curriculum 
                    if ($request->hasFile('curriculum') && $request->file('curriculum')->isValid()) {

                        $requestCurriculum = $request->curriculum;
    
                        $extension = $requestCurriculum->extension();
    
                        $curriculumName = md5($requestCurriculum->getClientOriginalName() . strtotime("now")) . "." . $extension;
    
                        $requestCurriculum->move(public_path('ficheiros/estudantes/curriculum'), $curriculumName);
    
                        $curriculum = $curriculumName;
                        DB::table('dadosdefesas')->where('id', $dado->id)->update(['curriculum' => $curriculum]);

                    }
                       // upload de bi
                       if ($request->hasFile('bi') && $request->file('bi')->isValid()) {

                        $requestBi = $request->bi;
    
                        $extension = $requestBi->extension();
    
                        $biName = md5($requestBi->getClientOriginalName() . strtotime("now")) . "." . $extension;
    
                        $requestBi->move(public_path('ficheiros/estudantes/bi'), $biName);
    
                        $bi = $biName;
                        DB::table('dadosdefesas')->where('id', $dado->id)->update(['bi' => $bi]);

                    }

                       // upload de declaracao de notas
                       if ($request->hasFile('declaracao_nota') && $request->file('declaracao_nota')->isValid()) {

                        $requestDeclaracao = $request->declaracao_nota;
    
                        $extension = $requestDeclaracao->extension();
    
                        $declaracaoName = md5($requestDeclaracao->getClientOriginalName() . strtotime("now")) . "." . $extension;
    
                        $requestDeclaracao->move(public_path('ficheiros/estudantes/declaracoes'), $declaracaoName);
    
                        $declaracao = $declaracaoName;
                        DB::table('dadosdefesas')->where('id', $dado->id)->update(['declaracao_nota' => $declaracao]);

                    }

                       // upload de monografia
                       if ($request->hasFile('monografia') && $request->file('monografia')->isValid()) {

                        $requestMonografia = $request->monografia;
    
                        $extension = $requestMonografia->extension();
    
                        $monografiaName = md5($requestMonografia->getClientOriginalName() . strtotime("now")) . "." . $extension;
    
                        $requestMonografia->move(public_path('ficheiros/estudantes/monografias'), $monografiaName);
    
                        $monografia = $monografiaName;
                        DB::table('dadosdefesas')->where('id', $dado->id)->update(['monografia' => $monografia]);

                    }

                    DB::table('estudantes')->where('id', $estudante->id)->update(['curso' => $curso]);
                    DB::table('estudantes')->where('id', $estudante->id)->update(['ano_ingresso' => $ano]);
                    DB::table('estudantes')->where('id', $estudante->id)->update(['regime' => $regime]);
                    DB::table('estudantes')->where('id', $estudante->id)->update(['num_estudante' => $num_estudante]);

                    return redirect()->back()->with(['msgSucessUpdate' => 'A palavra passe foi combinada correctamente']);
                }else {
                    return redirect()->back()->with(['msgErrorUpdate' => 'A palavra passe deve ter mais de 6 digitos']);
                }
            }else {
                return redirect()->back()->with(['msgIncorrecta' => 'Por favor verifique a palavra passe não coincide']);
            }
        }else {
            return redirect()->back()->with(['password_actual' => 'A palavra passe actual não coincide']);
        }
    }else{
        $name = $request->name;
        $email = $request->email;
        $username = $request->username;
        $curso = $request->curso;
        $ano = $request->ano_ingresso;
        $regime = $request->regime;
        $num_estudante =$request->num_estudante;

        DB::table('users')->where('id', $user->id)->update(['name' => $name]);
        DB::table('users')->where('id', $user->id)->update(['email' => $email]);
        DB::table('users')->where('id', $user->id)->update(['username' => $username]);

                // upload de foto 
                if ($request->hasFile('foto') && $request->file('foto')->isValid()) {

                    $requestImage = $request->foto;

                    $extension = $requestImage->extension();

                    $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

                    $requestImage->move(public_path('ficheiros/estudantes/fotos'), $imageName);

                    $foto = $imageName;
                    DB::table('estudantes')->where('id', $estudante->id)->update(['foto' => $foto]);
                }
                 // upload de curriculum 
                if ($request->hasFile('curriculum') && $request->file('curriculum')->isValid()) {

                    $requestCurriculum = $request->curriculum;

                    $extension = $requestCurriculum->extension();

                    $curriculumName = md5($requestCurriculum->getClientOriginalName() . strtotime("now")) . "." . $extension;

                    $requestCurriculum->move(public_path('ficheiros/estudantes/curriculum'), $curriculumName);

                    $curriculum = $curriculumName;
                    DB::table('dadosdefesas')->where('id', $dado->id)->update(['curriculum' => $curriculum]);

                }
                   // upload de bi
                   if ($request->hasFile('bi') && $request->file('bi')->isValid()) {

                    $requestBi = $request->bi;

                    $extension = $requestBi->extension();

                    $biName = md5($requestBi->getClientOriginalName() . strtotime("now")) . "." . $extension;

                    $requestBi->move(public_path('ficheiros/estudantes/bi'), $biName);

                    $bi = $biName;
                    DB::table('dadosdefesas')->where('id', $dado->id)->update(['bi' => $bi]);

                }

                   // upload de declaracao de notas
                   if ($request->hasFile('declaracao_nota') && $request->file('declaracao_nota')->isValid()) {

                    $requestDeclaracao = $request->declaracao_nota;

                    $extension = $requestDeclaracao->extension();

                    $declaracaoName = md5($requestDeclaracao->getClientOriginalName() . strtotime("now")) . "." . $extension;

                    $requestDeclaracao->move(public_path('ficheiros/estudantes/declaracoes'), $declaracaoName);

                    $declaracao = $declaracaoName;
                    DB::table('dadosdefesas')->where('id', $dado->id)->update(['declaracao_nota' => $declaracao]);

                }

                   // upload de monografia
                   if ($request->hasFile('monografia') && $request->file('monografia')->isValid()) {

                    $requestMonografia = $request->monografia;

                    $extension = $requestMonografia->extension();

                    $monografiaName = md5($requestMonografia->getClientOriginalName() . strtotime("now")) . "." . $extension;

                    $requestMonografia->move(public_path('ficheiros/estudantes/monografias'), $monografiaName);

                    $monografia = $monografiaName;
                    DB::table('dadosdefesas')->where('id', $dado->id)->update(['monografia' => $monografia]);

                }
        DB::table('estudantes')->where('id', $estudante->id)->update(['curso' => $curso]);
        DB::table('estudantes')->where('id', $estudante->id)->update(['ano_ingresso' => $ano]);
        DB::table('estudantes')->where('id', $estudante->id)->update(['regime' => $regime]);
        DB::table('estudantes')->where('id', $estudante->id)->update(['num_estudante' => $num_estudante]);
        return redirect()->back()->with(['msgSucess' => 'Dados actualizados com sucesso']);
    }
    return redirect()->back()->with(['msgError' => 'Erro ao actualizar os dados']);
    }

    /**
     * Funcao para eliminar um estudante.
     */

    public function destroyEstudante($id)
    {
        $user = User::findOrFail($id);
        $user->estudanteUser()->delete();
        $user->dadoUser()->delete();
        $user->delete();
        return redirect()->route('estudanteview')->with(['Mensagem' => 'Estudante eliminado com sucesso!']);
    }


    /**
     * --------------------------------------------------------------------------------------------------------------------------------
     * ----------------------------------------------------Fim Estudante---------------------------------------------------------------
     * --------------------------------------------------------------------------------------------------------------------------------
     */


    /**
     * --------------------------------------------------------------------------------------------------------------------------------
     * ----------------------------------------------------------Docente---------------------------------------------------------------
     * --------------------------------------------------------------------------------------------------------------------------------
     */
    /**
     * Funcao para listar todos todos.
     */
    public function indexDocentes()
    {
        $userauth = auth()->user();
        $docentes = $userauth->docenteDrcurso;
        //User::with('docenteUser')->with('docenteDrcurso')->where(['is_docente'=> 1])->get();
        return view('admin.docenteview', ['docentes' => $docentes]);
    }

    public function indexDocente()
    {
        $docentes = User::with('docenteUser')->with('docenteDrcurso')->where(['is_docente' => 1])->get();
        return view('admin.docenteview', ['docentes' => $docentes]);
    }


    /**
     * Funcao para pesquisa de docentes
     */
    public function searchDocente()
    {

        $search = request('search');

        if ($search) {
            $docentes = User::with('docenteUser')->where([
                'is_docente', 1, ['name', 'like', '%', $search . '%']
            ])->get();
        }
        return view('admin.docenteview', ['docentes' => $docentes, 'search' => $search]);
    }

    /**
     * Funcao para carregar o formulario de cadastro de um docente.
     */
    public function createDocente()
    {
        return view('admin.newdocente');
    }


    /*public function perfilDocente($id){
                            $user = User::findOrFail($id);
                            $docentes = $user->docenteUser()->get();
                            return view('admin.perfil', ['docentes' => $docentes]);
                    }


                    /**
                     * Funcao para salvar dados de cadsatro de um docente na base de dados.
                     */
    public function storeDocente(Request $request)
    {
        //$this->is_active = '0';
        //$this->is_docente = '0';
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->email;
        $confirPass = $request->confirm_password;
        $pass = $request->password;
        $active = $request->is_active;
        if ($pass == $confirPass) {
            if (strlen($pass) >= 6) {
                $user->password = Hash::make($request->password);
            } else {
                return redirect()->back()->with(['msgErrorPass' => 'A palavra passe tem ter no minimo 6 digitos']);
            }
        } else {
            return redirect()->back()->with(['msgPass' => 'A palavra passe nao coincide']);
        }
        if ($active == '1') {
            $user->is_active = $request->input('is_active');
        } else {
            $user->is_active = '0';
        }
        $user->is_docente = '1';
        $user->is_estudante = '0';
        $user->is_admin = '0';
        $user->is_drcurso = '0';
        $email = User::all()->where('email', '=', $user->email)->count();
        if ($email > 0) {
            $addDocente['success'] = false;
            $addDocente['mensagem'] = 'Esse email já esta registado no sistema!';
            return response()->json($addDocente);
        }
        $user->save();

        $id_user = $user->id;

        $docente = new Docente();
        $docente->curso = $request->curso;

        // upload de foto 
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {

            $requestImage = $request->foto;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('ficheiros/docentes/fotos'), $imageName);

            $docente->foto = $imageName;
        }

        // upload de curriculum 
        if ($request->hasFile('curriculum') && $request->file('curriculum')->isValid()) {


            $requestCurriculum = $request->curriculum;

            $extension = $requestCurriculum->extension();

            $curriculumName = md5($requestCurriculum->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestCurriculum->move(public_path('ficheiros/docentes/curriculum'), $curriculumName);

            $docente->curriculum = $curriculumName;
        }
        $userauth = auth()->user();
        $docente->id_drcurso = $userauth->id;
        $docente->id_user = $id_user;
        // $utilizador->save();

        /*$id_utilizador = $utilizador->id;

                        $docente =new UserDocente();
                        $docente->id_user = $id_user;
                        $docente->id_docente = $id_utilizador;*/

        if ($docente->save()) {
            return redirect()->route('docenteview')->with(['msgSucessStore' => 'Docente cadastrado com sucesso!']);
        } else {
            return redirect()->back()->with('msgErrorStore', 'Erro no cadastro do docente!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function showDocente($id)
    {
        $user = User::findOrFail($id);
        $docentes = $user->docenteUser()->get();
        return view('admin.showdocente', ['docentes' => $docentes]);
    }

    /**
     * Funcao para carregar o formuloario para editar dados de um docente.
     */
    public function editDocente($id)
    {

        $user = User::findOrFail($id);
        $docentes = $user->docenteUser()->get();
        return view('admin.editdocente', ['docentes' => $docentes]);
    }

    /*public function editPerfilDocente($id){

                            $user = User::findOrFail($id);
                            $docentes =$user->docenteUser()->get();
                            return view('admin.editperfil', ['docentes' => $docentes]);
                        }*/

    public function updatePerfilDocente(Request $request)
    {
    
            $user = auth()->user();
            $docente = $user->docenteUser;
            $userPassword = $user->password;

            if ($request->password_actual != "") {
                $newPass = $request->password;
                $confirPass = $request->confirm_password;
                $name = $request->name;
                $email = $request->email;
                $username = $request->username;
                $curso = $request->curso;
            
            if(Hash::check($request->password_actual, $userPassword)){

                if($newPass == $confirPass){
                    if(strlen($newPass) >= 6){
                        $user->password = Hash::make($request->password);
                        DB::table('users')->where('id', $user->id)->update(['password' => $user->password]); 
                        DB::table('users')->where('id', $user->id)->update(['name' => $name]);
                        DB::table('users')->where('id', $user->id)->update(['email' => $email]);
                        DB::table('users')->where('id', $user->id)->update(['username' => $username]);
                         // upload de foto 
                         if ($request->hasFile('foto') && $request->file('foto')->isValid()) {

                            $requestImage = $request->foto;

                            $extension = $requestImage->extension();

                            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

                            $requestImage->move(public_path('ficheiros/docentes/fotos'), $imageName);

                            $foto = $imageName;
                            DB::table('docentes')->where('id', $docente->id)->update(['foto' => $foto]);
                        }
                         // upload de foto 
                        if ($request->hasFile('curriculum') && $request->file('curriculum')->isValid()) {

                            $requestCurriculum = $request->curriculum;
        
                            $extension = $requestCurriculum->extension();
        
                            $curriculumName = md5($requestCurriculum->getClientOriginalName() . strtotime("now")) . "." . $extension;
        
                            $requestCurriculum->move(public_path('ficheiros/docentes/curriculum'), $curriculumName);
        
                            $curriculum = $curriculumName;
                            DB::table('docentes')->where('id', $docente->id)->update(['curriculum' => $curriculum]);

                        }

                        DB::table('docentes')->where('id', $docente->id)->update(['curso' => $curso]);

                        return redirect()->back()->with(['msgSucessUpdate' => 'A palavra passe foi combinada correctamente']);
                    }else {
                        return redirect()->back()->with(['msgErrorUpdate' => 'A palavra passe deve ter mais de 6 digitos']);
                    }
                }else {
                    return redirect()->back()->with(['msgIncorrecta' => 'Por favor verifique a palavra passe não coincide']);
                }
            }else {
                return redirect()->back()->with(['password_actual' => 'A palavra passe actual não coincide']);
            }
        }else{
            $name = $request->name;
            $email = $request->email;
            $username = $request->username;
            $curso = $request->curso;

            DB::table('users')->where('id', $user->id)->update(['name' => $name]);
            DB::table('users')->where('id', $user->id)->update(['email' => $email]);
            DB::table('users')->where('id', $user->id)->update(['username' => $username]);

                     // upload de foto 
                     if ($request->hasFile('foto') && $request->file('foto')->isValid()) {

                        $requestImage = $request->foto;

                        $extension = $requestImage->extension();

                        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

                        $requestImage->move(public_path('ficheiros/docentes/fotos'), $imageName);

                        $foto = $imageName;
                     DB::table('docentes')->where('id', $docente->id)->update(['foto' => $foto]);
                    }
                     // upload de foto 
                    if ($request->hasFile('curriculum') && $request->file('curriculum')->isValid()) {

                        $requestCurriculum = $request->curriculum;
    
                        $extension = $requestCurriculum->extension();
    
                        $curriculumName = md5($requestCurriculum->getClientOriginalName() . strtotime("now")) . "." . $extension;
    
                        $requestCurriculum->move(public_path('ficheiros/docentes/curriculum'), $curriculumName);
    
                        $curriculum = $curriculumName;
                    DB::table('docentes')->where('id', $docente->id)->update(['curriculum' => $curriculum]);

                    }
            DB::table('docentes')->where('id', $docente->id)->update(['curso' => $curso]);
            return redirect()->back()->with(['msgSucess' => 'Dados actualizados com sucesso']);
        }
        return redirect()->back()->with(['msgError' => 'Erro ao actualizar os dados']);
    }


    /**
     * Funcao para actualizar dados de um docente.
     */
    public function updateDocente(Request $request)
    {
        $user = User::findOrFail($request->id);
        $docente = $user->docenteUser;
        $userPassword = $user->password;

        if ($request->password_actual != "") {

            $newPass = $request->password;
            $confirPass = $request->confirm_password;
            $name = $request->name;
            $email = $request->email;
            $username = $request->username;
            $curso = $request->curso;
            $active = $request->is_active;

            if (Hash::check($request->password_actual, $userPassword)) {
                if ($newPass == $confirPass) {
                    if (strlen($newPass) >= 6) {
                        $user->password = Hash::make($request->password);
                        DB::table('users')
                            ->where('id', $user->id)
                            ->update(['password' => $user->password]);
                        $data = $request->all('name', 'email', 'username');
                        if ($active == '1') {
                            $is_active = $request->all('is_active');
                            $user->update($is_active);
                        } else{
                            $user->is_active = '0';   
                        }
                        $user->update($data);
                        DB::table('docentes')->where('id', $docente->id)->update(['curso' => $curso]);

                        return redirect()->route('docenteview')->with(['msgSucessUpdate' => 'A palavra passe foi combinada correctamente']);
                    } else {
                        return redirect()->back()->with(['msgErrorUpdate' => 'A palavra passe deve ter mais de 6 digitos']);
                    }
                } else {
                    return redirect()->back()->with(['msgIncorrecta' => 'Por favor verifique a palavra passe não coincide']);
                }
            } else {
                return redirect()->back()->with(['password_actual' => 'A palavra passe actual não coincide']);
            }
        } else {
            $curso = $request->curso;
            $active = $request->is_active;
            $data = $request->all('name', 'email', 'username');
            if ($active == '1') {
                $is_active = $request->all('is_active');
                $user->update($is_active);
            } else{
                $user->is_active = '0';   
            }
            DB::table('docentes')->where('id', $docente->id)->update(['curso' => $curso]);
            $user->update($data);
            return redirect()->route('docenteview')->with(['msgSucess' => 'Dados actualizados com sucesso']);
        }
        return redirect()->back()->with(['msgError' => 'Erro ao actualizar os dados']);
    }

    /**
     * Funcao para eliminar um docente.
     */

    public function destroyDocente($id)
    {

        $user = User::findOrFail($id);
        $docente = $user->docentes();
        $docente->delete();

        return redirect()->route('docenteview')->with(['msgSucess' => 'Estudante eliminado com sucesso!']);
    }

    /**
     * --------------------------------------------------------------------------------------------------------------------------------
     * ------------------------------------------------------Fim Docente---------------------------------------------------------------
     * --------------------------------------------------------------------------------------------------------------------------------
     */





    /**
     * --------------------------------------------------------------------------------------------------------------------------------
     * ------------------------------------------------------Dr. Curso-----------------------------------------------------------------
     * --------------------------------------------------------------------------------------------------------------------------------
     */

    /**
     * Funcao para listar todos estudantes.
     */
    public function indexDrcurso()
    {

        $drcurso = User::with('drcursoUser')->where('is_drcurso', 1)->get();
        return view('admin.drcurso', compact('drcurso'));
    }
    /**
     * Funcao para pesquisa de drs. cursos
     */
    public function searchDrcurso()
    {

        $search = request('search');

        if ($search) {
            $drcursos = User::with('drcursoUser')->where([
                'is_drcurso', 1, ['name', 'like', '%', $search . '%']
            ])->get();
        }
        return view('admin.docenteview', ['drcursos' => $drcursos, 'search' => $search]);
    }

    /**
     * Funcao para carregar o formulario de cadastro de um docente.
     */
    public function createDrcurso()
    {
        return view('admin.newdrcurso');
    }


    /* public function perfilDrcurso($id){
                                $user = User::findOrFail($id);
                                $drcursos = $user->drcursoUser()->get();
                                return view('admin.perfiladmin', ['drcursos' => $drcursos]);
                            }
                            
                            /**
                             * Funcao para salvar dados de cadsatro de um docente na base de dados.
                             */
    public function storeDrcurso(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->email;
        $confirPass = $request->confirm_password;
        $pass = $request->password;
        $active = $request->is_active;
        $drcur =$request->is_drcurso;
        if ($pass == $confirPass) {
            if (strlen($pass) >= 6) {
                $user->password = Hash::make($request->password);
            } else {
                return redirect()->back()->with(['msgErrorPass' => 'A palavra passe tem ter no minimo 6 digitos']);
            }
        } else {
            return redirect()->back()->with(['msgPass' => 'A palavra passe nao coincide']);
        }
        if ($active == '1') {
            $user->is_active = $request->input('is_active');
        } else {
            $user->is_active = '0';
        }
        $user->is_docente = '0';
        $user->is_estudante = '0';
        $user->is_admin = '0';

        if ($drcur == '1') {
            $user->is_drcurso = $request->input('is_active');
        } else {
            $user->is_drcurso = '0';
        }

        $email = User::all()->where('email', '=', $user->email)->count();
        if ($email > 0) {
            $addDocente['success'] = false;
            $addDocente['mensagem'] = 'Esse email já esta registado no sistema!';
            return response()->json($addDocente);
        }
        $user->save();

        $id_user = $user->id;

        $drcurso = new Drcurso();
        $drcurso->curso = $request->curso;

        // upload de foto 
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('ficheiros/docentes/fotos'), $imageName);

            $drcurso->foto = $imageName;
        }

        // upload de curriculum 
        if ($request->hasFile('curriculum') && $request->file('curriculum')->isValid()) {


            $requestCurriculum = $request->curriculum;

            $extension = $requestCurriculum->extension();

            $curriculumName = md5($requestCurriculum->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestCurriculum->move(public_path('ficheiros/docentes/curriculum'), $curriculumName);

            $drcurso->curriculum = $curriculumName;
        }
        //$utilizador->curriculum = $request->curriculum;
        // $utilizador->foto = $request->foto;
        $drcurso->id_user = $id_user;

        //$utilizador->save();

        // $id_utilizador = $utilizador->id;

        //$druser = new User();

        //$user->drcurso()->attach($id_utilizador);
        //  $utilizador->user()->attach($id_user);

        /*$drcurso =new UserDrcurso();
                                $drcurso->id_user = $id_user;
                                $drcurso->id_drcurso = $id_utilizador;*/

        if ($drcurso->save()) {
            return redirect()->route('drcursoview')->with('msgSucessStore', 'Docente cadastrado com sucesso!');
        } else {
            return redirect()->back()->with('msgErrorStore', 'Erro no cadastro do docente!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function showDrcurso($id)
    {
        $user = User::findOrFail($id);
        $drcursos = $user->drcursoUser()->get();
        return view('admin.showdrcurso', ['drcursos' => $drcursos]);
    }


    /**
     * Funcao para carregar o formuloario para editar dados de um docente.
     */
    public function editDrcurso($id)
    {

        $user = User::findOrFail($id);
        $drcursos = $user->drcursoUser()->get();
        return view('admin.editdrcurso', compact('drcursos'));
    }

    /*public function editPerfilDrcurso($id){

                                $user = User::findOrFail($id);
                                $perfilDrcurso =$user->drcursoUser()->get();
                                return view('admin.editperfildrcurso', ['perfilDrcurso' => $perfilDrcurso]);
                            }*/



    /**
     * Funcao para actualizar dados de um docente.
     */
    public function updateDrcurso(Request $request)
    {
        $user = User::findOrFail($request->id);
        $drcurso = $user->drcursoUser;
        $userPassword = $user->password;

        if ($request->password_actual != "") {

            $newPass = $request->password;
            $confirPass = $request->confirm_password;
            $name = $request->name;
            $email = $request->email;
            $username = $request->username;
            $curso = $request->curso;
            $active = $request->is_active;
            $drcur = $request->is_drcurso;

            if (Hash::check($request->password_actual, $userPassword)) {
                if ($newPass == $confirPass) {
                    if (strlen($newPass) >= 6) {
                        $user->password = Hash::make($request->password);
                        DB::table('users')
                            ->where('id', $user->id)
                            ->update(['password' => $user->password]);
                        $data = $request->all('name', 'email', 'username');
                        if ($active == '1') {
                            $is_active = $request->all('is_active');
                            $user->update($is_active);
                        } else{
                            $user->is_active = '0';   
                        }
                        if ($drcur == '1') {
                            $is_drcurso = $request->all('is_drcurso');
                            $user->update($is_drcurso);
                        } else{
                            $user->is_drcurso = '0';   
                        }
                        $user->update($data);
                        DB::table('drcursos')->where('id', $drcurso->id)->update(['curso' => $curso]);

                        return redirect()->route('drcursoview')->with(['msgSucessUpdate' => 'A palavra passe foi combinada correctamente']);
                    } else {
                        return redirect()->back()->with(['msgErrorUpdate' => 'A palavra passe deve ter mais de 6 digitos']);
                    }
                } else {
                    return redirect()->back()->with(['msgIncorrecta' => 'Por favor verifique a palavra passe não coincide']);
                }
            } else {
                return redirect()->back()->with(['password_actual' => 'A palavra passe actual não coincide']);
            }
        } else {
            $curso = $request->curso;
            $active = $request->is_active;
            $drcur =$request->is_drcurso;
            $data = $request->all('name', 'email', 'username');
            if ($active == '1') {
                $is_active = $request->all('is_active');
                $user->update($is_active);
            } else{
                $user->is_active = '0';   
            }
            if ($drcur == '1') {
                $is_drcurso = $request->all('is_drcurso');
                $user->update($is_drcurso);
            } else{
                $user->is_drcurso = '0';   
            }
            DB::table('drcursos')->where('id', $drcurso->id)->update(['curso' => $curso]);
            $user->update($data);
            return redirect()->route('drcursoview')->with(['msgSucess' => 'Dados actualizados com sucesso']);
        }
        return redirect()->back()->with(['msgError' => 'Erro ao actualizar os dados']);
    }

    public function updatePerfilDrcurso(Request $request){
        $user = auth()->user();
        $drcurso = $user->drcursoUser;
        $userPassword = $user->password;

        if ($request->password_actual != "") {
            $newPass = $request->password;
            $confirPass = $request->confirm_password;
            $name = $request->name;
            $email = $request->email;
            $username = $request->username;
            $curso = $request->curso;
        
        if(Hash::check($request->password_actual, $userPassword)){

            if($newPass == $confirPass){
                if(strlen($newPass) >= 6){
                    $user->password = Hash::make($request->password);
                    DB::table('users')->where('id', $user->id)->update(['password' => $user->password]); 
                    DB::table('users')->where('id', $user->id)->update(['name' => $name]);
                    DB::table('users')->where('id', $user->id)->update(['email' => $email]);
                    DB::table('users')->where('id', $user->id)->update(['username' => $username]);
                     // upload de foto 
                     if ($request->hasFile('foto') && $request->file('foto')->isValid()) {

                        $requestImage = $request->foto;

                        $extension = $requestImage->extension();

                        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

                        $requestImage->move(public_path('ficheiros/docentes/fotos'), $imageName);

                        $foto = $imageName;
                        DB::table('drcursos')->where('id', $drcurso->id)->update(['foto' => $foto]);
                    }
                     // upload de foto 
                    if ($request->hasFile('curriculum') && $request->file('curriculum')->isValid()) {

                        $requestCurriculum = $request->curriculum;
    
                        $extension = $requestCurriculum->extension();
    
                        $curriculumName = md5($requestCurriculum->getClientOriginalName() . strtotime("now")) . "." . $extension;
    
                        $requestCurriculum->move(public_path('ficheiros/docentes/curriculum'), $curriculumName);
    
                        $curriculum = $curriculumName;
                        DB::table('drcursos')->where('id', $drcurso->id)->update(['curriculum' => $curriculum]);

                    }

                    DB::table('drcursos')->where('id', $drcurso->id)->update(['curso' => $curso]);

                    return redirect()->back()->with(['msgSucessUpdate' => 'A palavra passe foi combinada correctamente']);
                }else {
                    return redirect()->back()->with(['msgErrorUpdate' => 'A palavra passe deve ter mais de 6 digitos']);
                }
            }else {
                return redirect()->back()->with(['msgIncorrecta' => 'Por favor verifique a palavra passe não coincide']);
            }
        }else {
            return redirect()->back()->with(['password_actual' => 'A palavra passe actual não coincide']);
        }
    }else{
        $name = $request->name;
        $email = $request->email;
        $username = $request->username;
        $curso = $request->curso;

        DB::table('users')->where('id', $user->id)->update(['name' => $name]);
        DB::table('users')->where('id', $user->id)->update(['email' => $email]);
        DB::table('users')->where('id', $user->id)->update(['username' => $username]);

                 // upload de foto 
                 if ($request->hasFile('foto') && $request->file('foto')->isValid()) {

                    $requestImage = $request->foto;

                    $extension = $requestImage->extension();

                    $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

                    $requestImage->move(public_path('ficheiros/docentes/fotos'), $imageName);

                    $foto = $imageName;
                 DB::table('drcursos')->where('id', $drcurso->id)->update(['foto' => $foto]);
                }
                 // upload de foto 
                if ($request->hasFile('curriculum') && $request->file('curriculum')->isValid()) {

                    $requestCurriculum = $request->curriculum;

                    $extension = $requestCurriculum->extension();

                    $curriculumName = md5($requestCurriculum->getClientOriginalName() . strtotime("now")) . "." . $extension;

                    $requestCurriculum->move(public_path('ficheiros/docentes/curriculum'), $curriculumName);

                    $curriculum = $curriculumName;
                DB::table('drcursos')->where('id', $drcurso->id)->update(['curriculum' => $curriculum]);

                }
        DB::table('drcursos')->where('id', $drcurso->id)->update(['curso' => $curso]);
        return redirect()->back()->with(['msgSucess' => 'Dados actualizados com sucesso']);
    }
    return redirect()->back()->with(['msgError' => 'Erro ao actualizar os dados']);
    }
    /**
     * Funcao para eliminar um Dr.curso.
     * 
     */
    public function destroyDrcurso($id)
    {

        $user = User::findOrfail($id);
        $drcurso = $user->drcursos()->delete();
        $drcurso->delete();

        return redirect()->route('drcursoview')->with('msgDelete', 'Estudante eliminado com sucesso!');
    }





    /**
     * --------------------------------------------------------------------------------------------------------------------------------
     * ------------------------------------------------------Fim Dr. Curso-------------------------------------------------------------
     * --------------------------------------------------------------------------------------------------------------------------------
     */




    /**
     * --------------------------------------------------------------------------------------------------------------------------------
     * ------------------------------------------------------Administrador-------------------------------------------------------------
     * --------------------------------------------------------------------------------------------------------------------------------
     */
    /**
     * Funcao para salvar dados de cadastro de um administrador.
     */
    public function storeAdmin(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $confirPass = $request->confirm_password;
        $pass = $request->password;
        if ($pass == $confirPass) {
            if (strlen($pass) >= 6) {
                $user->password = Hash::make($request->password);
            } else {
                return redirect()->back()->with(['msgErrorPass' => 'A palavra passe tem ter no minimo 6 digitos']);
            }
        } else {
            return redirect()->back()->with(['msgPass' => 'A palavra passe nao coincide']);
        }
        $user->is_estudante = '0';
        $user->is_docente = '0';
        $user->is_drcurso = '0';
        $user->is_active = $request->is_active;
        $user->is_admin = $request->is_admin;
        $user->save();
        $id_user = $user->id;

        $utilizador = new Drcurso();
        $utilizador->curso = $request->curso;
        // upload de foto 
        /*if($request->hasFile('foto') && $request->file('foto')->isValid()){
                                

                            $requestImage = $request->foto;

                            $extension = $requestImage->extension();

                            $imageName=md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

                            $requestImage->foto->move(public_path('ficheros/fotos/docente'), $imageName);

                            $utilizador->foto = $imageName;
                        }*/
        $utilizador->foto = $request->foto;
        $utilizador->curriculum = $request->curriculum;
        $utilizador->id_user = $id_user;
        /*$utilizador->save();
                        $id_utilizador = $utilizador->id;

                        $admin = new UserDrcurso();
                        $admin->id_user = $id_user;
                        $admin->id_drcurso = $id_utilizador;*/

        if ($utilizador->save()) {
            return response()->json(['Mensagem' => 'Administrador registado com sucesso!']);
        } else {
            return response()->json(['Mensagem' => 'Erro no cadsatro do administrador!']);
        }
    }

    public function perfil($id)
    {
        $user = User::findOrFail($id);
        $drcursos = $user->drcursoUser()->get();
        $docentes = $user->docenteUser()->get();
        return view('admin.perfil', ['drcursos' => $drcursos, 'docentes' => $docentes]);
    }

    public function editPerfil($id)
    {
        $user = User::findOrFail($id);
        $perfil = $user->drcursoUser()->get();
        $perfildocente = $user->docenteUser()->get();
        return view('admin.editperfil', ['perfil' => $perfil, 'perfildocente' => $perfildocente]);
    }

    public function updatePerfilAdmin(Request $request)
    {
        $user = auth()->user();
        $drcurso = $user->drcursoUser;
        $userPassword = $user->password;

        if ($request->password_actual != "") {
            $newPass = $request->password;
            $confirPass = $request->confirm_password;
            $name = $request->name;
            $email = $request->email;
            $username = $request->username;
            $curso = $request->curso;
        
        if(Hash::check($request->password_actual, $userPassword)){

            if($newPass == $confirPass){
                if(strlen($newPass) >= 6){
                    $user->password = Hash::make($request->password);
                    DB::table('users')->where('id', $user->id)->update(['password' => $user->password]); 
                    DB::table('users')->where('id', $user->id)->update(['name' => $name]);
                    DB::table('users')->where('id', $user->id)->update(['email' => $email]);
                    DB::table('users')->where('id', $user->id)->update(['username' => $username]);
                     // upload de foto 
                     if ($request->hasFile('foto') && $request->file('foto')->isValid()) {

                        $requestImage = $request->foto;

                        $extension = $requestImage->extension();

                        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

                        $requestImage->move(public_path('ficheiros/docentes/fotos'), $imageName);

                        $foto = $imageName;
                        DB::table('drcursos')->where('id', $drcurso->id)->update(['foto' => $foto]);
                    }
                     // upload de foto 
                    if ($request->hasFile('curriculum') && $request->file('curriculum')->isValid()) {

                        $requestCurriculum = $request->curriculum;
    
                        $extension = $requestCurriculum->extension();
    
                        $curriculumName = md5($requestCurriculum->getClientOriginalName() . strtotime("now")) . "." . $extension;
    
                        $requestCurriculum->move(public_path('ficheiros/docentes/curriculum'), $curriculumName);
    
                        $curriculum = $curriculumName;
                        DB::table('drcursos')->where('id', $drcurso->id)->update(['curriculum' => $curriculum]);

                    }

                    DB::table('drcursos')->where('id', $drcurso->id)->update(['curso' => $curso]);

                    return redirect()->back()->with(['msgSucessUpdate' => 'A palavra passe foi combinada correctamente']);
                }else {
                    return redirect()->back()->with(['msgErrorUpdate' => 'A palavra passe deve ter mais de 6 digitos']);
                }
            }else {
                return redirect()->back()->with(['msgIncorrecta' => 'Por favor verifique a palavra passe não coincide']);
            }
        }else {
            return redirect()->back()->with(['password_actual' => 'A palavra passe actual não coincide']);
        }
    }else{
        $name = $request->name;
        $email = $request->email;
        $username = $request->username;
        $curso = $request->curso;

        DB::table('users')->where('id', $user->id)->update(['name' => $name]);
        DB::table('users')->where('id', $user->id)->update(['email' => $email]);
        DB::table('users')->where('id', $user->id)->update(['username' => $username]);

                 // upload de foto 
                 if ($request->hasFile('foto') && $request->file('foto')->isValid()) {

                    $requestImage = $request->foto;

                    $extension = $requestImage->extension();

                    $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

                    $requestImage->move(public_path('ficheiros/docentes/fotos'), $imageName);

                    $foto = $imageName;
                 DB::table('drcursos')->where('id', $drcurso->id)->update(['foto' => $foto]);
                }
                 // upload de foto 
                if ($request->hasFile('curriculum') && $request->file('curriculum')->isValid()) {

                    $requestCurriculum = $request->curriculum;

                    $extension = $requestCurriculum->extension();

                    $curriculumName = md5($requestCurriculum->getClientOriginalName() . strtotime("now")) . "." . $extension;

                    $requestCurriculum->move(public_path('ficheiros/docentes/curriculum'), $curriculumName);

                    $curriculum = $curriculumName;
                DB::table('drcursos')->where('id', $drcurso->id)->update(['curriculum' => $curriculum]);

                }
        DB::table('drcursos')->where('id', $drcurso->id)->update(['curso' => $curso]);
        return redirect()->back()->with(['msgSucess' => 'Dados actualizados com sucesso']);
    }
    return redirect()->back()->with(['msgError' => 'Erro ao actualizar os dados']);


    }
    /**
     * --------------------------------------------------------------------------------------------------------------------------------
     * ------------------------------------------------------Fim Administraor----------------------------------------------------------
     * --------------------------------------------------------------------------------------------------------------------------------
     */
}
