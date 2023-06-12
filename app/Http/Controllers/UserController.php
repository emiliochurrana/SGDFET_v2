<?php

namespace App\Http\Controllers;

use App\Models\Defesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Docente;
use App\Models\Drcurso;
use App\Models\Estudante;
use App\Models\DadosDefesa;
use App\Models\Visitante;
use App\Models\Galeria;
use App\Models\Monografia;
use App\Models\Noticia;
use DateTime;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    //public $is_active = '0';
    //public $is_docente ='0';
   
    public function sobreAntes(){
        $drcurso = User::all()->where('is_drcurso', 1);
        $galerias = Galeria::all();
        $defesa = Defesa::all();
        $monografia = Monografia:: all();
        $estudante = User::all()->where('is_estudante', 1);
        $docente = User::all()->where('is_docente', 1);

        return view('usuario.sobre', ['galerias' => $galerias, 
        'monografia' => $monografia, 
        'defesa' => $defesa,
        'estudante' => $estudante,
        'docente' => $docente,
        'drcurso' => $drcurso]);

    }

    public function sobreDepois(){
        $drcurso = User::all()->where('is_drcurso', 1);
        $galerias = Galeria::all();
        $defesa = Defesa::all();
        $monografia =Monografia:: all();
        $estudante = User::all()->where('is_estudante', 1);
        $docente = User::all()->where('is_docente', 1);

        return view('usuario.sobredepois', ['galerias' => $galerias,
        'monografia' => $monografia, 
        'defesa' => $defesa,
        'estudante' => $estudante,
        'docente' => $docente,
        'drcurso' => $drcurso]);

    }
    public function dashboard(Request $request)
    {

        $admin = User::where('is_admin', 1)->get();
        $defesas = Defesa::all();
        $monografias = Monografia::all();
        $estudantes = User::all()->where('is_estudante',1);
        $docentes = User::all()->where('is_docente', 1);
        $query1 = Defesa::query();
        $data_jan =DateTime::createFromFormat('m', $request->get('data',01));
        if($data_jan){
            $query1->whereMonth('data', '=', $data_jan);
        }
        $def_jan = $query1->paginate();

        $query2 = Defesa::query();
        $data_feb =DateTime::createFromFormat('m', $request->get('data',02));
        if($data_feb){
            $query2->whereMonth('data', '=', $data_feb);
        }
        $def_feb = $query2->paginate();

        $query3 = Defesa::query();
        $data_mar =DateTime::createFromFormat('m', $request->get('data',03));
        if($data_mar){
            $query3->whereMonth('data', '=', $data_mar);
        }
        $def_mar = $query3->paginate();

        $query4 = Defesa::query();
        $data_apr =DateTime::createFromFormat('m', $request->get('data',04));
        if($data_apr){
            $query4->whereMonth('data', '=', $data_apr);
        }
        $def_apr = $query4->paginate();

        $query5 = Defesa::query();
        $data_may =DateTime::createFromFormat('m', $request->get('data',05));
        if($data_may){
            $query5->whereMonth('data', '=', $data_may);
        }
        $def_may = $query5->paginate();

        $query6 = Defesa::query();
        $data_jun =DateTime::createFromFormat('m', $request->get('data',06));
        if($data_jun){
            $query6->whereMonth('data', '=', $data_jun);
        }
        $def_jun = $query6->paginate();

        $query7 = Defesa::query();
        $data_jul = DateTime::createFromFormat('m', $request->get('data',07));
        if($data_jul){
            $query7->whereMonth('data', '=', $data_jul);
        }
        $def_jul = $query7->paginate();

        $query8 = Defesa::query();
        $data_aug =DateTime::createFromFormat('m', $request->get('data','08'));
        if($data_aug){
            $query8->whereMonth('data', '=', $data_aug);
        }
        $def_aug = $query8->paginate();

        $query9 = Defesa::query();
        $data_sep =DateTime::createFromFormat('m', $request->get('data','09'));
        if($data_sep){
            $query9->whereMonth('data', '=', $data_sep);
        }
        $def_sep = $query9->paginate();

        $query10 = Defesa::query();
        $data_out =DateTime::createFromFormat('m', $request->get('data',10));
        if($data_out){
            $query10->whereMonth('data', '=', $data_out);
        }
        $def_out = $query10->paginate();

        $query11 = Defesa::query();
        $data_nov =DateTime::createFromFormat('m', $request->get('data',11));
        if($data_nov){
            $query11->whereMonth('data', '=', $data_nov);
        }
        $def_nov = $query11->paginate();

        $query12 = Defesa::query();
        $data_dec =DateTime::createFromFormat('m', $request->get('data',12));
        if($data_dec){
            $query12->whereMonth('data', '=', $data_dec);
        }
        $def_dec = $query12->paginate();

        return view('admin.dashboard', ['admin' => $admin, 'defesas' => $defesas, 'monografias' => $monografias, 'estudantes' => $estudantes, 'docentes' => $docentes, 
        'def_jan' => $def_jan, 
        'def_feb' => $def_feb,
        'def_mar' => $def_mar,
        'def_apr' => $def_apr,
        'def_may' => $def_may,
        'def_jun' => $def_jun,
        'def_jul' => $def_jul,
        'def_aug' => $def_aug,
        'def_sep' => $def_sep,
        'def_out' => $def_out,
        'def_nov' => $def_nov,
        'def_dec' => $def_dec]);
    }

    public function dashboardDocente(Request $request)
    {

        $docente = User::where('is_docente', 1)->get();
        $defesas =Defesa::all();
        $monografias = Monografia::all();
        $estudantes = User::all()->where('is_estudante',1);
        $docentes = User::all()->where('is_docente', 1);
        $query1 = Defesa::query();
        $data_jan =DateTime::createFromFormat('m', $request->get('data',01));
        if($data_jan){
            $query1->whereMonth('data', '=', $data_jan);
        }
        $def_jan = $query1->paginate();

        $query2 = Defesa::query();
        $data_feb =DateTime::createFromFormat('m', $request->get('data',02));
        if($data_feb){
            $query2->whereMonth('data', '=', $data_feb);
        }
        $def_feb = $query2->paginate();

        $query3 = Defesa::query();
        $data_mar =DateTime::createFromFormat('m', $request->get('data',03));
        if($data_mar){
            $query3->whereMonth('data', '=', $data_mar);
        }
        $def_mar = $query3->paginate();

        $query4 = Defesa::query();
        $data_apr =DateTime::createFromFormat('m', $request->get('data',04));
        if($data_apr){
            $query4->whereMonth('data', '=', $data_apr);
        }
        $def_apr = $query4->paginate();

        $query5 = Defesa::query();
        $data_may =DateTime::createFromFormat('m', $request->get('data',05));
        if($data_may){
            $query5->whereMonth('data', '=', $data_may);
        }
        $def_may = $query5->paginate();

        $query6 = Defesa::query();
        $data_jun =DateTime::createFromFormat('m', $request->get('data',06));
        if($data_jun){
            $query6->whereMonth('data', '=', $data_jun);
        }
        $def_jun = $query6->paginate();

        $query7 = Defesa::query();
        $data_jul = DateTime::createFromFormat('m', $request->get('data',07));
        if($data_jul){
            $query7->whereMonth('data', '=', $data_jul);
        }
        $def_jul = $query7->paginate();

        $query8 = Defesa::query();
        $data_aug =DateTime::createFromFormat('m', $request->get('data','08'));
        if($data_aug){
            $query8->whereMonth('data', '=', $data_aug);
        }
        $def_aug = $query8->paginate();

        $query9 = Defesa::query();
        $data_sep =DateTime::createFromFormat('m', $request->get('data','09'));
        if($data_sep){
            $query9->whereMonth('data', '=', $data_sep);
        }
        $def_sep = $query9->paginate();

        $query10 = Defesa::query();
        $data_out =DateTime::createFromFormat('m', $request->get('data',10));
        if($data_out){
            $query10->whereMonth('data', '=', $data_out);
        }
        $def_out = $query10->paginate();

        $query11 = Defesa::query();
        $data_nov =DateTime::createFromFormat('m', $request->get('data',11));
        if($data_nov){
            $query11->whereMonth('data', '=', $data_nov);
        }
        $def_nov = $query11->paginate();

        $query12 = Defesa::query();
        $data_dec =DateTime::createFromFormat('m', $request->get('data',12));
        if($data_dec){
            $query12->whereMonth('data', '=', $data_dec);
        }
        $def_dec = $query12->paginate();


        return view('admin.dashboardocente', ['docente' => $docente, 'defesas' => $defesas, 'monografias' => $monografias, 'estudantes' => $estudantes, 'docentes' => $docentes,
        'def_jan' => $def_jan, 
        'def_feb' => $def_feb,
        'def_mar' => $def_mar,
        'def_apr' => $def_apr,
        'def_may' => $def_may,
        'def_jun' => $def_jun,
        'def_jul' => $def_jul,
        'def_aug' => $def_aug,
        'def_sep' => $def_sep,
        'def_out' => $def_out,
        'def_nov' => $def_nov,
        'def_dec' => $def_dec]);
    }

    public function dashboardDrcurso(Request $request)
    {

        $drcurso = User::where('is_drcurso', 1)->get();
        $defesas = Defesa::all();
        $monografias = Monografia::all();
        $estudantes = User::all()->where('is_estudante',1);
        $docentes = User::all()->where('is_docente', 1);
        $query1 = Defesa::query();
        $data_jan =DateTime::createFromFormat('m', $request->get('data',01));
        if($data_jan){
            $query1->whereMonth('data', '=', $data_jan);
        }
        $def_jan = $query1->paginate();

        $query2 = Defesa::query();
        $data_feb =DateTime::createFromFormat('m', $request->get('data',02));
        if($data_feb){
            $query2->whereMonth('data', '=', $data_feb);
        }
        $def_feb = $query2->paginate();

        $query3 = Defesa::query();
        $data_mar =DateTime::createFromFormat('m', $request->get('data',03));
        if($data_mar){
            $query3->whereMonth('data', '=', $data_mar);
        }
        $def_mar = $query3->paginate();

        $query4 = Defesa::query();
        $data_apr =DateTime::createFromFormat('m', $request->get('data',04));
        if($data_apr){
            $query4->whereMonth('data', '=', $data_apr);
        }
        $def_apr = $query4->paginate();

        $query5 = Defesa::query();
        $data_may =DateTime::createFromFormat('m', $request->get('data',05));
        if($data_may){
            $query5->whereMonth('data', '=', $data_may);
        }
        $def_may = $query5->paginate();

        $query6 = Defesa::query();
        $data_jun =DateTime::createFromFormat('m', $request->get('data',06));
        if($data_jun){
            $query6->whereMonth('data', '=', $data_jun);
        }
        $def_jun = $query6->paginate();

        $query7 = Defesa::query();
        $data_jul = DateTime::createFromFormat('m', $request->get('data',07));
        if($data_jul){
            $query7->whereMonth('data', '=', $data_jul);
        }
        $def_jul = $query7->paginate();

        $query8 = Defesa::query();
        $data_aug =DateTime::createFromFormat('m', $request->get('data','08'));
        if($data_aug){
            $query8->whereMonth('data', '=', $data_aug);
        }
        $def_aug = $query8->paginate();

        $query9 = Defesa::query();
        $data_sep =DateTime::createFromFormat('m', $request->get('data','09'));
        if($data_sep){
            $query9->whereMonth('data', '=', $data_sep);
        }
        $def_sep = $query9->paginate();

        $query10 = Defesa::query();
        $data_out =DateTime::createFromFormat('m', $request->get('data',10));
        if($data_out){
            $query10->whereMonth('data', '=', $data_out);
        }
        $def_out = $query10->paginate();

        $query11 = Defesa::query();
        $data_nov =DateTime::createFromFormat('m', $request->get('data',11));
        if($data_nov){
            $query11->whereMonth('data', '=', $data_nov);
        }
        $def_nov = $query11->paginate();

        $query12 = Defesa::query();
        $data_dec =DateTime::createFromFormat('m', $request->get('data',12));
        if($data_dec){
            $query12->whereMonth('data', '=', $data_dec);
        }
        $def_dec = $query12->paginate();


        return view('admin.dashboardrcurso', ['drcurso' => $drcurso, 'defesas' => $defesas, 'monografias' => $monografias, 'estudantes' => $estudantes, 'docentes' => $docentes,
        'def_jan' => $def_jan, 
        'def_feb' => $def_feb,
        'def_mar' => $def_mar,
        'def_apr' => $def_apr,
        'def_may' => $def_may,
        'def_jun' => $def_jun,
        'def_jul' => $def_jul,
        'def_aug' => $def_aug,
        'def_sep' => $def_sep,
        'def_out' => $def_out,
        'def_nov' => $def_nov,
        'def_dec' => $def_dec]);
    }

    public function inicio()
    {
        $drcurso = User::all()->where('is_drcurso', 1);
        $noticias = Noticia::all();
        $galerias = Galeria::all();
        $defesa = Defesa::all();
        $monografia =Monografia:: all();
        $estudante = User::all()->where('is_estudante', 1);
        $docente = User::all()->where('is_docente', 1);
        $defesas = Defesa::with('estudanteDefesa')->orderBy('id', 'desc')->limit(4)->get();
        $monografias = Monografia::with('estudanteMonografia')->orderBy('id', 'desc')->limit(4)->get();

        return view('usuario.inicio', ['noticias' => $noticias, 'galerias' => $galerias, 'defesas' => $defesas, 'monografias' => $monografias, 
        'monografia' => $monografia, 
        'defesa' => $defesa,
        'estudante' => $estudante,
        'docente' => $docente,
        'drcurso' => $drcurso]);
    }

    public function home()
    {
        $defesa = Defesa::all();
        $monografia = Monografia::all();
        $estudante = User::all()->where('is_estudante', 1);
        $docente = User::all()->where('is_docente', 1);
        $drcurso = User::all()->where('is_drcurso', 1);
        $noticias = Noticia::all();
        $galerias = Galeria::all();
        $defesas = Defesa::with('estudanteDefesa')->orderBy('id', 'desc')->limit(4)->get();
        $monografias = Monografia::with('estudanteMonografia')->orderBy('id', 'desc')->limit(4)->get();
        
        return view('usuario.home', ['noticias' => $noticias, 'galerias' => $galerias, 'defesas' => $defesas, 'monografias' => $monografias, 
        'monografia' => $monografia, 
        'defesa' => $defesa,
        'estudante' => $estudante,
        'docente' => $docente,
        'drcurso' => $drcurso]);
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

        $search = request('search');

        if ($search) {
            $userlog = auth()->user()->id;
            $estudantes = Estudante::where([
                   ['id_docente',$userlog], ['num_estudante', 'like', '%' .$search . '%'],
            ])->get();
        }else{
            $userauth = auth()->user();

            $estudantes = $userauth->estudanteDocente;
        }     
        return view('admin.estudantesview', ['estudantes' => $estudantes, 'search' => $search]);
    }

    public function indexEstudante()
    
    {
        $search = request('search');

        if ($search) {
            $estudantes = User::with('estudanteUser')->where([
                ['is_estudante', 1], ['name', 'like', '%' .$search . '%']
            ])->get();
        }else{
            $estudantes = User::with('estudanteUser')->where(['is_estudante' => 1])->get();
        }
        return view('admin.estudantesview', ['estudantes' => $estudantes, 'search' => $search]);
    }

    /**
     * Funcao para carregar o formulario de cadastro de um estudante .
     */
    public function createEstudante()
    {
        //
        return view('admin.newestudante');
    }

    /**
     * Funcao para salvar dados de cadsatro de um do estudante na base de dados.
     */
    public function storeEstudante(Request $request)
    {
        //$this->is_active = '0';
       $validateData = $request->validate(
           [
            'name' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'num_estudante' => 'required',
            'regime' => 'required',
            'foto' => 'required',
            'ano_ingresso' => 'required',
            'supervisor' => 'required',
            'curso' => 'required',
            'nivel' => 'required',
            'tema' => 'required',
            'password' => 'required',
            'confirm_password' => 'required'
           ], 
            [
            'name.required' => 'Campo nome é obrigatório',
            'email.required' => 'Campo email é obrigatório',
            'username.required' => 'Campo nome do usuario é obrigatório',
            'num_estudante.required' => 'Campo numero do estudante é obrigatório',
            'regime.required' => 'Campo regime é obrigatório',
            'foto.required' => 'Campo foto é obrigatório',
            'ano_ingresso.required' => 'Campo ano é obrigatório',
            'supervisor.required' => 'Campo supervisor é obrigatório',
            'curso.required' => 'campo curso é obrigatório',
            'nivel.required' => 'Campo nivel é obrigatório',
            'tema.required' => 'Campo tema é obrigatório',
            'password.required' => 'Campo senha é obrigatório',
            'confirm_password.required' => 'Campo de confirmação de senha é obrigatório',
        ]);
    
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $confirPass = $request->confirm_password;
        $pass = $request->password;
        $active = $request->is_active;
        $autorize = $request->is_autorize;
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
        if ($autorize == '1') {
            $user->is_autorize = $request->input('is_autorize');
        } else {
            $user->is_autorize = '0';
        }
        $user->is_estudante = '1';
        $user->is_docente = '0';
        $user->is_admin = '0';
        $user->is_drcurso = '0';
        $user->is_visitante = '0';
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
        $estudante->nivel = $request->input('nivel');
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
        $autorize = $request->is_autorize;

        if ($request->password_actual != "") {

            $newPass = $request->password;
            $confirPass = $request->confirm_password;
            $name = $request->name;
            $email = $request->email;
            $curso = $request->curso;
            $username = $request->num_estudante;
            $tema = $request->tema;
            $nivel = $request->nivel;
            $regime = $request->regime;
            $is_active = $request->is_active;
            $is_autorize = $request->is_autorize;

            if (Hash::check($request->password_actual, $userPassword)) {
                if ($newPass == $confirPass) {
                    if (strlen($newPass) >= 6) {
                        $user->password = Hash::make($request->password);
                        DB::table('users')
                            ->where('id', $user->id)
                            ->update(['password' => $user->password]);
                            DB::table('users')
                            ->where('id', $user->id)
                            ->update(['username' => $username]);

                        $data = $request->all('name', 'email');
                        $foto = $request->all('foto');
                        
                        if ($active == '1') {
                            $is_active = $request->all('is_active');
                            $user->update($is_active);
                        } else {
                            $user->is_active = '0';
                        }

                        if ($autorize == '1') {
                            $is_autorize = $request->all('is_autorize');
                            $user->update($is_autorize);
                        } else {
                            $user->is_autorize = '0';
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
                        DB::table('estudantes')->where('id', $estudante->id)->update(['tema' => $tema]);
                        DB::table('estudantes')->where('id', $estudante->id)->update(['num_estudante' => $username]);
                        DB::table('estudantes')->where('id', $estudante->id)->update(['nivel' => $nivel]);
                        DB::table('estudantes')->where('id', $estudante->id)->update(['regime' => $regime]);

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
            $tema = $request->tema;
            $username = $request->num_estudante;
            $nivel = $request->nivel;
            $regime = $request->regime;
            $foto = $request->all('foto');
            $data = $request->all('name', 'email', 'foto');
           
            if ($active == '1') {
                $is_active = $request->all('is_active');
                $user->update($is_active);
            } else{
                $user->is_active = '0';   
            }

            if ($autorize == '1') {
                $is_autorize = $request->all('is_autorize');
                $user->update($is_autorize);
            } else {
                $user->is_autorize = '0';
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
            DB::table('estudantes')->where('id', $estudante->id)->update(['tema' => $tema]);
            DB::table('estudantes')->where('id', $estudante->id)->update(['num_estudante' => $username]);
            DB::table('estudantes')->where('id', $estudante->id)->update(['nivel' => $nivel]);
            DB::table('estudantes')->where('id', $estudante->id)->update(['regime' => $regime]);
            DB::table('users')->where('id', $user->id)->update(['username' => $username]);

            $user->update($data);

            return redirect()->route('estudanteview')->with(['msgSucess' => 'Dados actualizados com sucesso']);
        }
        return redirect()->back()->with(['msgError' => 'Erro ao actualizar os dados']);
    }

    public function perfilEstudante($id)
    {
        $user = User::findOrFail($id);
        $estudantes = $user->estudanteUser()->get();
        $dados = $user->dadoUser()->get();
        $defesa = Defesa::all();
        $monografia = Monografia::all();
        $galerias = Galeria::all();
        $estudante = User::all()->where('is_estudante', 1);
        $docente = User::all()->where('is_docente', 1);
        $drcurso = User::all()->where('is_drcurso', 1); 
        return view('usuario.perfilestudante', ['estudantes' => $estudantes, 'dados' => $dados,
        'defesa' => $defesa,
        'monografia' => $monografia,
        'estudante' => $estudante,
        'docente' => $docente,
        'drcurso' => $drcurso,
        'galerias' => $galerias]);
    }

    public function editPerfilEstudante($id)
    {

        $user = User::findOrFail($id);
        $estudantes = $user->estudanteUser()->get();
        $dados = $user->dadoUser()->get();
        $defesa = Defesa::all();
        $monografia = Monografia::all();
        $galerias = Galeria::all();
        $estudante = User::all()->where('is_estudante', 1);
        $docente = User::all()->where('is_docente', 1);
        $drcurso = User::all()->where('is_drcurso', 1); 
        return view('usuario.editperfilestudante', ['estudantes' => $estudantes, 'dados' => $dados,
        'defesa' => $defesa,
        'monografia' => $monografia,
        'estudante' => $estudante,
        'docente' => $docente,
        'drcurso' => $drcurso,
        'galerias' => $galerias]);
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
                    //DB::table('users')->where('id', $user->id)->update(['username' => $username]);
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
                    //DB::table('estudantes')->where('id', $estudante->id)->update(['num_estudante' => $num_estudante]);

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
        //DB::table('users')->where('id', $user->id)->update(['username' => $username]);

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
        //DB::table('estudantes')->where('id', $estudante->id)->update(['num_estudante' => $num_estudante]);
        return redirect()->back()->with(['msgSucess' => 'Dados actualizados com sucesso']);
    }
    return redirect()->back()->with(['msgError' => 'Erro ao actualizar os dados']);
    }

    /**
     * Funcao para eliminar um estudante.
     */

    public function destroyEstudante($id)
    {
        $user = User::where('id',$id);
        $estudante = Estudante::where('id_user', $id);
        $dado = DadosDefesa::where('id_estudante', $id);
        $estudante->firstorfail()->delete();
        $dado->firstorfail()->delete();
        $user->firstorfail()->delete();

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
        $search = request('search');

        if ($search) {
            $userlog = auth()->user()->id;
            $docentes = Docente::where([
                ['id_drcurso', $userlog], ['nome', 'like', '%' .$search . '%']
            ])->get();
        }else{
        $userauth = auth()->user();
        $docentes = $userauth->docenteDrcurso;
        }
        //User::with('docenteUser')->with('docenteDrcurso')->where(['is_docente'=> 1])->get();
        return view('admin.docenteview', ['docentes' => $docentes, 'search' => $search]);
    }

    public function indexDocente()
    {
        $search = request('search');

        if ($search) {
            $docentes = User::with('docenteUser')->where([
                ['is_docente', 1], ['name', 'like', '%' .$search . '%']
            ])->get();
        }else{
            $docentes = User::with('docenteUser')->with('docenteDrcurso')->where(['is_docente' => 1])->get();
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
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email', 
                'username' => 'required',
                'password' => 'required',
                'confirm_password' => 'required',
                'foto' => 'required',
                'curso' => 'required',
                'curriculum' => 'required'
            ],
            
            [
                'name.required' => 'Campo nome é obrigatório',
                'email.required' => 'Campo email é obrigatório',
                'username.required' => 'Campo nome do usuario é obrigatório',
                'password.required' => 'Campo senha é obrigatório',
                'confirm_password.required' => 'Campo de confirmação de senha é obrigatório',
                'foto.required' => 'Campo foto é obrigatório',
                'curso.required' => 'Campo curso é obrigatório',
                'curriculum.required' => 'Campo curriculum é obrigatório'

        ]);
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
        $user->is_autorize = '0';
        $user->is_visitante ='0';
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
        $docente->nome = $request->name;

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
                $nome =$request->name;
                $email = $request->email;
                $username = $request->email;
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
                        DB::table('docentes')->where('id', $docente->id)->update(['nome' => $nome]);

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
            $nome = $request->name;
            $email = $request->email;
            $username = $request->email;
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
                    DB::table('docentes')->where('id', $docente->id)->update(['nome' => $nome]);
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
            $username = $request->email;
            $curso = $request->curso;
            $nome = $request->name;
            $active = $request->is_active;

            if (Hash::check($request->password_actual, $userPassword)) {
                if ($newPass == $confirPass) {
                    if (strlen($newPass) >= 6) {
                        $user->password = Hash::make($request->password);
                        DB::table('users')
                            ->where('id', $user->id)
                            ->update(['password' => $user->password]);
                        DB::table('users')
                            ->where('id', $user->id)
                            ->update(['username' => $username]);
                        $data = $request->all('name', 'email');
                        if ($active == '1') {
                            $is_active = $request->all('is_active');
                            $user->update($is_active);
                        } else{
                            $user->is_active = '0';   
                        }
                        $user->update($data);
                        DB::table('docentes')->where('id', $docente->id)->update(['curso' => $curso]);
                        DB::table('docentes')->where('id', $docente->id)->update(['nome' => $nome]);

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
            $nome = $request->name;
            $active = $request->is_active;
            $username = $request->email;
            $data = $request->all('name', 'email');
            if ($active == '1') {
                $is_active = $request->all('is_active');
                $user->update($is_active);
            } else{
                $user->is_active = '0';   
            }
            DB::table('docentes')->where('id', $docente->id)->update(['curso' => $curso]);
            DB::table('docentes')->where('id', $docente->id)->update(['nome' => $nome]);
            DB::table('users')->where('id', $user->id)->update(['username' => $username]);
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
        $search = request('search');

        if ($search) {
            $drcurso = User::with('drcursoUser')->where([
               ['is_drcurso', 1], ['name', 'like', '%' .$search . '%']
            ])->get();
        }else{

        $drcurso = User::with('drcursoUser')->where('is_drcurso', 1)->get();
        }
        return view('admin.drcurso', ['drcurso' => $drcurso, 'search' => $search]);
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
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'username' => 'required',
                'password' => 'required',
                'confirm_password' => 'required',
                'curso' => 'required',
                'image' => 'required',
                'curriculum' => 'required'
            ], 
        [
            'name.required' => 'Campo nome é obrigatório', 
            'email.required' => 'Campo email é obrigatório',
            'username.required' => 'Campo nome do usuario é obrigatório',
            'password.required' => 'Campo senha é obrigatório',
            'confirm_password.required' => 'Campo de confirmação de senha é obrigatório',
            'curso.required' => 'Campo curso é obrigatório',
            'image.required' => 'Campo foto é obrigatório',
            'curriculum.required' => 'Campo curriculum é obrigatório'
        ]);
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
        $user->is_autorize = '0';
        $user->is_visitante = '0';
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
            $username = $request->email;
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
                            DB::table('users')
                            ->where('id', $user->id)
                            ->update(['username' => $username]);
                        $data = $request->all('name', 'email');
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
            $username = $request->email;
            $data = $request->all('name', 'email');
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
            DB::table('users')->where('id', $user->id)->update(['username' => $username]);
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
        $user->is_autorize = '0';
        $user->is_visitante = '0';
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
            $username = $request->email;
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
        $username = $request->email;
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



 /**
     * --------------------------------------------------------------------------------------------------------------------------------
     * --------------------------------------------Visitante---------------------------------------------------------------------------
     * --------------------------------------------------------------------------------------------------------------------------------
     */
    /**
     * Funcao para listar todos estudantes.
     */

    public function indexVisitantes()
    
    {
        $search = request('search');

        if ($search) {
            $visitantes = User::with('visitanteUser')->where([
                ['is_visitante', 1], ['name', 'like', '%' .$search . '%']
            ])->get();
        }else{
            $visitantes = User::with('visitanteUser')->where(['is_visitante' => 1])->get();
        }
        return view('admin.visitanteview', ['visitantes' => $visitantes, 'search' => $search]);
    }

    /**
     * Funcao para carregar o formulario de cadastro de um estudante .
     */
    public function createVisitante()
    {
        //
        return view('usuario.formcadastro');
    }

    /**
     * Funcao para salvar dados de cadsatro de um do visitante na base de dados.
     */
    public function storeVisitante(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $confirPass = $request->confirm_password;
        $pass = $request->password;
        if ($pass == $confirPass) {
            if (strlen($pass) >= 6) {
                $user->password = Hash::make($request->password);
            } else {
                return redirect()->back()->with(['msgErrorPass' => 'A palavra passe tem ter no minimo 6 digitos']);
            }
        } else {
            return redirect()->back()->with(['msgPass' => 'Erro a palavra passe não coincide']);
        }
    
        $user->is_active = '1';
        $user->is_estudante = '0';
        $user->is_docente = '0';
        $user->is_admin = '0';
        $user->is_drcurso = '0';
        $user->is_visitante = '1';
        $user->is_autorize = '0';
        $user->username = $request->email;
        $email = User::all()->where('email', '=', $user->email)->count();
        if ($email > 0) {
            $addEstudante['success'] = false;
            return redirect()->back()->with(['msgEmail' => 'O email inserido já esta associado a uma conta no sistema!']);
        }
        $user->save();
        $id_user = $user->id;

        $visitante = new Visitante();
        // upload de foto 
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {

            $requestImage = $request->foto;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('ficheiros/visitantes/fotos'), $imageName);

            $visitante->foto = $imageName;
        }
        
        $visitante->id_user = $id_user;
        ///$utilizador->save();
        //$id_utilizador = $utilizador->id;

        /* $estudante = new UserEstudante();
                $estudante->id_user = $id_user;
                $estudante->id_estudante = $id_utilizador;*/

        if ($visitante->save()) {

            return redirect()->route('login')->with(['msgSucessStore' => 'Estudante cadastrado com sucesso!']);
        } else {
            return redirect()->back()->with(['msgErrorStore' => 'Erro no cadastro do estudante!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function showVisitante($id)
    {
        //
        $user = User::findOrFail($id);
        $visitantes = $user->visitanteUser()->get();
        return view('admin.showvisitante', ['visitantes' => $visitantes]);
    }

    /*
      Funcao para carregar o formulario para editar dados de um estudante.
    
    public function editVisitante($id)
    {

        $user = User::findOrFail($id);
        $estudantes = $user->estudanteUser()->get();
        $dados = $user->dadoUser()->get();
        return view('admin.editestudante', ['estudantes' => $estudantes, 'dados' => $dados]);
    }

*/
    public function perfilVisitante($id)
    {
        $user = User::findOrFail($id);
        $visitantes = $user->visitanteUser()->get();
        $defesa = Defesa::all();
        $monografia = Monografia::all();
        $galerias = Galeria::all();
        $estudante = User::all()->where('is_estudante', 1);
        $docente = User::all()->where('is_docente', 1);
        $drcurso = User::all()->where('is_drcurso', 1); 
        return view('usuario.perfilvisitante', ['visitantes' => $visitantes,
        'defesa' => $defesa,
        'monografia' => $monografia,
        'estudante' => $estudante,
        'docente' => $docente,
        'drcurso' => $drcurso,
        'galerias' => $galerias]);
    }

    public function editPerfilVisitante($id)
    {

        $user = User::findOrFail($id);
        $visitantes = $user->visitanteUser()->get();
        $defesa = Defesa::all();
        $monografia = Monografia::all();
        $galerias = Galeria::all();
        $estudante = User::all()->where('is_estudante', 1);
        $docente = User::all()->where('is_docente', 1);
        $drcurso = User::all()->where('is_drcurso', 1); 
        return view('usuario.editperfilvisitante', ['visitantes' => $visitantes,
        'defesa' => $defesa,
        'monografia' => $monografia,
        'estudante' => $estudante,
        'docente' => $docente,
        'drcurso' => $drcurso,
        'galerias' => $galerias]);
    }


    public function updatePerfilVisitante(Request $request)
    {

        $user = auth()->user();
        $visitante = $user->visitanteUser;
        $userPassword = $user->password;
        if ($request->password_actual != "") {
            $newPass = $request->password;
            $confirPass = $request->confirm_password;
            $name = $request->name;
            $email = $request->email;
            $username = $request->username;
        
        if(Hash::check($request->password_actual, $userPassword)){

            if($newPass == $confirPass){
                if(strlen($newPass) >= 6){
                    $user->password = Hash::make($request->password);
                    DB::table('users')->where('id', $user->id)->update(['password' => $user->password]); 
                    DB::table('users')->where('id', $user->id)->update(['name' => $name]);
                    DB::table('users')->where('id', $user->id)->update(['email' => $email]);
                    DB::table('users')->where('id', $user->id)->update(['username' => $username]);
                    //DB::table('users')->where('id', $user->id)->update(['username' => $username]);
                     // upload de foto 
                     if ($request->hasFile('foto') && $request->file('foto')->isValid()) {

                        $requestImage = $request->foto;

                        $extension = $requestImage->extension();

                        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

                        $requestImage->move(public_path('ficheiros/visitantes/fotos'), $imageName);

                        $foto = $imageName;
                        DB::table('visitantes')->where('id', $visitante->id)->update(['foto' => $foto]);
                    }

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

        DB::table('users')->where('id', $user->id)->update(['name' => $name]);
        DB::table('users')->where('id', $user->id)->update(['email' => $email]);
        DB::table('users')->where('id', $user->id)->update(['username' => $username]);

                // upload de foto 
                if ($request->hasFile('foto') && $request->file('foto')->isValid()) {

                    $requestImage = $request->foto;

                    $extension = $requestImage->extension();

                    $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

                    $requestImage->move(public_path('ficheiros/visitantes/fotos'), $imageName);

                    $foto = $imageName;
                    DB::table('visitantes')->where('id', $visitante->id)->update(['foto' => $foto]);
                }
                 
        return redirect()->back()->with(['msgSucess' => 'Dados actualizados com sucesso']);
    }
    return redirect()->back()->with(['msgError' => 'Erro ao actualizar os dados']);
    }

    /**
     * Funcao para eliminar um estudante.
     */

    public function destroyVisitante($id)
    {
        $user = User::findOrFail($id);
        $docente = $user->visitanteUser();
        $docente->delete();

        return redirect()->route('visitanteview')->with(['visitanteDelete' => 'Visitante eliminado com sucesso!']);
    }


    /**
     * --------------------------------------------------------------------------------------------------------------------------------
     * ----------------------------------------------------Fim Visitante---------------------------------------------------------------
     * --------------------------------------------------------------------------------------------------------------------------------
     */

}