<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Personnel;
use App\Equipe;
use Auth;
use Session;

class personnelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $etat = 'liste';
        $personnels = Personnel::all();
        $equipes = Equipe::all();
         return view('personnels/index')->with([
            'personnels' => $personnels,'equipes' => $equipes,'etat' => $etat
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
    DB::table('personnel')->insert(['nom' => $request->get('nom'),
    'prenom' => $request->get('nom'),
    'equipe_id' => $request->get('equipe'),
    ]);

         toastr()->success('Le technicien a été crée avec succès!');

        return redirect()->route('personnels.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
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
        $personnel = Personnel::findOrFail($id);
        $personnels = Personnel::all();
        $equipes = Equipe::all();

        return view('personnels/index')->with(['personnels' => $personnels, 'personnel' => $personnel,'equipes' => $equipes, 'etat' => $etat ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('personnel')
        ->where('id', $id)
        ->update(['nom' => $request->get('nom'),
                    'prenom' => $request->get('prenom'),
                    'equipe_id' => $request->get('equipe')
                ]);

    toastr()->success('Le technicien a été modifié avec succès!');

    return redirect()->route('personnels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = DB::table('personnel')->where('id', '=', $id)->delete();

        if($delete == true){
            toastr()->warning('Suppression effectuée avec succes!');
            return redirect()->route('personnels.index');
        }else{
          toastr()->error('Erreur lors de la suppression!');
            return redirect()->route('personnels.index');
        }
    }
}
