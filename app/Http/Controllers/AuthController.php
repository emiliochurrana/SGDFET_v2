<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function create(){
        return view ('usuario.login');
    }

    public function login(Request $request){

    $userLog  = User::all()->where('username', '=', $request->input('username'))->first();
    if($userLog){

/**
 * ----------------------------------------------------------------------------------------------------------------------------------------------------------
 * -------------------------------------------------------------Estudante------------------------------------------------------------------------------------
 * ----------------------------------------------------------------------------------------------------------------------------------------------------------
 */
      
        if($userLog->is_estudante == '1'){
            if($userLog->is_active == '1'){

                $credencias = [
                    'username' => $request->input('username'),
                    'password' => $request->input('password')
                ];
        
                if(Auth::attempt($credencias)){
                    $user = Auth::user();
                    $token = $user->createToken('SECRET_TOKEN');
        
                    $login['success'] = true;
                    $login['token'] = $token->plainTextToken;
                    $login['user'] = $user;
        
                    return redirect('/inicio');
                }

                $login['success'] = false;
                $login['mensagem'] = 'Dados invalidos';
                return redirect('/login');

            }
            $login['success'] = false;
            $login['mensagem'] = 'Dados invalidos';
            return redirect('/login');
        }
/**
 * ----------------------------------------------------------------------------------------------------------------------------------------------------------
 * -------------------------------------------------------------Fim Estudante------------------------------------------------------------------------------------
 * ----------------------------------------------------------------------------------------------------------------------------------------------------------
 */
      

/**
 * -----------------------------------------------------------------------------------------------------------------------------------------------------
 * ----------------------------------------------------------Docente------------------------------------------------------------------------------------
 * -----------------------------------------------------------------------------------------------------------------------------------------------------
 * 
 */
        if($userLog->is_docente == '1'){
            if($userLog->is_active == '1'){

                $credencias = [
                    'username' => $request->input('username'),
                    'password' => $request->input('password')
                ];
        
                if(Auth::attempt($credencias)){
                    $user = Auth::user();
                    $token = $user->createToken('SECRET_TOKEN');
        
                    $login['success'] = true;
                    $login['token'] = $token->plainTextToken;
                    $login['user'] = $user;
        
                    return redirect('/dashboardocente');
                }

                $login['success'] = false;
                $login['mensagem'] = 'Dados invalidos';
                return redirect('/login');

            }
            $login['success'] = false;
            $login['mensagem'] = 'Dados invalidos';
            return redirect('/login');
        }

/**
 * ----------------------------------------------------------------------------------------------------------------------------------------------------------
 * -------------------------------------------------------------Fim Docente------------------------------------------------------------------------------------
 * ----------------------------------------------------------------------------------------------------------------------------------------------------------
 */
      



/**
 * ----------------------------------------------------------------------------------------------------------------------------------------------------------
 * -------------------------------------------------------------Dr. Curso------------------------------------------------------------------------------------
 * ----------------------------------------------------------------------------------------------------------------------------------------------------------
 */
                    
            if($userLog->is_drcurso == '1'){
                if($userLog->is_active == '1'){

                    $credencias = [
                        'username' => $request->input('username'),
                        'password' => $request->input('password')
                    ];

                    if(Auth::attempt($credencias)){
                        $user = Auth::user();
                        $token = $user->createToken('SECRET_TOKEN');

                        $login['success'] = true;
                        $login['token'] = $token->plainTextToken;
                        $login['user'] = $user;

                        return redirect('/dashboardrcurso');
                    }

                    $login['success'] = false;
                    $login['mensagem'] = 'Dados invalidos';
                    return redirect('/login');

                }
                $login['success'] = false;
                $login['mensagem'] = 'Dados invalidos';
                return redirect('/login');
            }

/**
 * ----------------------------------------------------------------------------------------------------------------------------------------------------------
 * -------------------------------------------------------------Fim Dr. Curso--------------------------------------------------------------------------------
 * ----------------------------------------------------------------------------------------------------------------------------------------------------------
 */
      



/**
 * ---------------------------------------------------------------------------------------------------------------------------------------------------
 * -------------------------------------------------------------Administrador-------------------------------------------------------------------------
 * ---------------------------------------------------------------------------------------------------------------------------------------------------
 */
            if($userLog->is_admin == '1'){
                if($userLog->is_active == '1'){

                    $credencias = [
                        'username' => $request->input('username'),
                        'password' => $request->input('password')
                    ];

                    if(Auth::attempt($credencias)){
                        $user = Auth::user();
                        $token = $user->createToken('SECRET_TOKEN');

                        $login['success'] = true;
                        $login['token'] = $token->plainTextToken;
                        $login['user'] = $user;

                        return redirect('/dashboard');
                    }

                    $login['success'] = false;
                    $login['mensagem'] = 'Dados invalidos';
                    return redirect('/login');

                }
                $login['success'] = false;
                $login['mensagem'] = 'Dados invalidos';
                return redirect('/login');
            }

/**
 * ----------------------------------------------------------------------------------------------------------------------------------------------------------
 * -------------------------------------------------------------Fim Administrador----------------------------------------------------------------------------
 * ----------------------------------------------------------------------------------------------------------------------------------------------------------
 */
      

    }
    $login['success'] = false;
    $login['mensagem'] = 'Dados invalidos';
    return redirect('/login');
        
    }


   /* public function login(Request $request){
        $userLog  = User::all()->where('username', '=', $request->input('username'))->first();
        if($userLog){
            if($userLog->is_estudante == '1'){
                if($userLog->is_active == '1'){
                    $credencias = [
                        'username' => $request->input('username'),
                        'password' => $request->input('password')
                    ];
                    if(Auth::attempt($credencias)){
                        $user = Auth::user();
                        session(['user' => $user]);
                        $login['success'] = true;
                        return redirect('/inicio');
                        //return response()->json($login);
                    }
                } 
                $login['success'] = false;
                $login['mensagem'] = 'Dados invalidos';
                return response()->json($login);    
            }


            if($userLog->is_admin == '1'){
                if($userLog->is_active == '1'){
                    $credencias = [
                        'username' => $request->input('username'),
                        'password' => $request->input('password')
                    ];
                    if(Auth::attempt($credencias)){
                        $user = Auth::user();
                        session(['user' => $user]);
                        $login['success'] = true;
                        return redirect('/dashboard');
                        //return response()->json($login);
                    }
                } 
                $login['success'] = false;
                $login['mensagem'] = 'Dados invalidos';
                return response()->json($login);    
            }

            if($userLog->is_drcurso == '1'){
                if($userLog->is_active == '1'){
                    $credencias = [
                        'username' => $request->input('username'),
                        'password' => $request->input('password')
                    ];
                    if(Auth::attempt($credencias)){
                        $user = Auth::user();
                        session(['user' => $user]);
                        $login['success'] = true;
                        return redirect('/dashboard');
                        return response()->json($login);
                    }
                } 
                $login['success'] = false;
                $login['mensagem'] = 'Dados invalidos';
                return response()->json($login);    
            }

            if($userLog->is_docente == '1'){
                if($userLog->is_active == '1'){
                    $credencias = [
                        'username' => $request->input('username'),
                        'password' => $request->input('password')
                    ];
                    if(Auth::attempt($credencias)){
                        $user = Auth::user();
                        session(['user' => $user]);
                        $login['success'] = true;
                        return redirect('/dashboard');
                        //return response()->json($login);
                    }
                } 
                $login['success'] = false;
                $login['mensagem'] = 'Dados invalidos';
                return response()->json($login);    
            }
                    }
        $login['success'] = false;
        $login['mensagem'] = 'Dados invalidos insere';
        return response()->json($login);
    }*/

    
    
    
    
    
    
/*public function login(Request $request)
{
    $user = User::where('email', '=', $request->email)->first();
    if($user->is_active == '1' || $user->is_estudante == '1'){

        if(Hash::check($request->input('password'), $user->password)){
            $request->session()->put('loginId', $user->id);
            return redirect('');
        }else{

        }
    }
}*/
    public function logout(){
        Auth::logout();
        Session::forget('user');
        return redirect('/login');
       // $user = request()->user();
       // $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
    }
    
   
}
