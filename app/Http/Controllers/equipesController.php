<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipe;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;

class equipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $etat = 'liste';
        $equipes = Equipe::with('personnels')->get();

        return view('equipes/index')->with(['equipes' => $equipes, 'etat' => $etat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create(Request $request)
    {
        $request->validate(['libelle' => 'required|unique:equipes',]);
        
        $equipe = new Equipe;

        $equipe->libelle = $request->get('libelle');

        $equipe->save();

         toastr()->success('L\'équipe a été crée avec succès!');

        return redirect()->route('equipes.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $etat = 'editer';
        $equipe = Equipe::findOrFail($id);
        $equipes = Equipe::with('personnels')->get();

        return view('equipes/index')->with(['equipes' => $equipes, 'equipe' => $equipe, 'etat' => $etat ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate(['libelle' => 'required',]);
        $equipe = Equipe::find($id);
        $equipe->libelle = $request->get('libelle');

        $equipe->save();

        toastr()->success('Modification effectuée avec succes!');
   
        return redirect()->route('equipes.index')->with('success','Great');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $delete = DB::table('equipes')->where('id', '=', $id)->delete();

        if($delete == true){
            toastr()->warning('Suppression effectuée avec succes!');
            return redirect()->route('equipes.index');
        }else{
          toastr()->error('Erreur lors de la suppression!');
            return redirect()->route('equipes.index');
        }
    }
}
