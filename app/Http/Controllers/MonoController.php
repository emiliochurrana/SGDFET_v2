<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Monografia;

class MonoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $search = request('search');

        if($search){
            $mono = Monografia::where([
                ['title', 'like', '%', $search. '%']
            ])->get();
        }
        return view('monografiaview', ['monografia' => $mono, 'search' => $search]);
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
        $mono = new Monografia();
        $mono->autor = $request->input('autor');
        $mono->tema = $request->input('tema');
        $mono->curso = $request->input('curso');
        $mono->resumo = $request->input('resumo');
        $mono->nivel = $request->input('nivel');
        $mono->supervisor = $request->input('supervisor');
        $mono->ficheiro =$request->input('ficheiro');
        
        $mono->save();
    }

    /**
     * Display the specified resource.
     */
    public function showMonografia(string $id)
    {
        //
        $mono = Monografia::findOrFail($id);
        return view('monografia.show', ['mono'=> $mono]);
    }

    public function dashboard(){
        $user = auth()->user();
        $mono = $user->mono;
        return view('view.dashboard', ['mono' => $mono]);
    } 
    
    /**
     * Show the form for editing the specified resource.
     * 
     */


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
    public function destroy(string $id)
    {
        //
    }
}
