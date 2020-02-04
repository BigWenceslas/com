<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Installations;
use App\Equipe;
use Auth;
use Session;

class installationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $etat = 'liste';
        $installations = Installations::all();
        $equipes = Equipe::all();
         return view('installations/index')->with([
            'installations' => $installations,'equipes' => $equipes,'etat' => $etat
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create(Request $request)
    {
       DB::table('installations')->insert(['libelle' => $request->get('libelle'),
        'numero' => $request->get('numero'),
        'date' => $request->get('date'),
        'equipe_id' => $request->get('equipe'),
        ]);

            toastr()->success('Installation crée avec succès!');

            return redirect()->route('installations.index');
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
        $installation = Installations::with('equipe')->findOrFail($id);
        $installations = Installations::with('equipe')->get();
        $equipes = Equipe::all();

        return view('installations/index')->with(['installation' => $installation, 'installations' => $installations,'equipes' => $equipes, 'etat' => $etat ]);
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
         DB::table('installations')
        ->where('id', $id)
        ->update(['libelle' => $request->get('libelle'),
                    'numero' => $request->get('numero'),
                    'date' => $request->get('date'),
                    'equipe_id' => $request->get('equipe')
                ]);

    toastr()->success('Installation modifiée avec succès!');

    return redirect()->route('installations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = DB::table('installations')->where('id', '=', $id)->delete();

        if($delete == true){
            toastr()->warning('Suppression effectuée avec succes!');
            return redirect()->route('etudes.index');
        }else{
          toastr()->error('Erreur lors de la suppression!');
            return redirect()->route('installations.index');
        }
    }
}
