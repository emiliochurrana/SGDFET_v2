<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request){
        $userLog  = User::all()->where('username', '=', $request->input('username'))->first();
        if($userLog){
            if($userLog->is_docente == '1' || $userLog->is_admin == '1'|| $userLog->is_estudante == '1'){
                if($userLog->is_verified == 1){
                    $credencias = [
                        'username' => $request->input('username'),
                        'password' => $request->input('password')
                    ];
                    if(Auth::attempt($credencias)){
                        $user = Auth::user();
                        session(['user' => $user]);
                        $login['success'] = true;
                        return response()->json($login);
                    }
                } 
                $login['success'] = false;
                $login['mensagem'] = 'Dados invalidos';
                return response()->json($login);    
            }
            else{
                $data = $userLog->created_at;
                if($data <= '2021-11-01 00:00:00'){
                    if($userLog->is_verified == 1){
                        $credencias = [
                            'username' => $request->input('username'),
                            'password' => $request->input('password')
                        ];
                        if(Auth::attempt($credencias)){
                            $user = Auth::user();
                            session(['user' => $user]);
                            $login['success'] = true;
                            return response()->json($login);
                        }
                    } 
                    $login['success'] = false;
                    $login['mensagem'] = 'Dados invalidos';
                    return response()->json($login);
                } else{
                    if($userLog->is_verified == 1 && $userLog->is_confirmed){
                        $credencias = [
                            'username' => $request->input('username'),
                            'password' => $request->input('password')
                        ];
                        if(Auth::attempt($credencias)){
                            $user = Auth::user();
                            session(['user' => $user]);
                            $login['success'] = true;
                            return response()->json($login);
                        }
                    } 
                    $login['success'] = false;
                    $login['mensagem'] = 'Dados invalidos';
                    return response()->json($login);
                }
            }
        }
        $login['success'] = false;
        $login['mensagem'] = 'Dados invalidos';
        return response()->json($login);
    }
    public function logout(){
        Auth::logout();
        Session::forget('user');
        return redirect()->route('home');
    }
    
   
}
