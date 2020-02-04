<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Etudes;
use App\Equipe;
use Auth;
use Session;

class etudesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etat = 'liste';
        $etudes = Etudes::all();
        $equipes = Equipe::all();
         return view('etudes/index')->with([
            'etudes' => $etudes,'equipes' => $equipes,'etat' => $etat
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        DB::table('etudes')->insert(['libelle' => $request->get('nom'),
        'type' => $request->get('type'),
        'date' => $request->get('date'),
        'equipe_id' => $request->get('equipe'),
        ]);

            toastr()->success('L\'Etude a été crée avec succès!');

            return redirect()->route('etudes.index');
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
        $etude = Etudes::with('equipe')->findOrFail($id);
        $etudes = Etudes::with('equipe')->get();
        $equipes = Equipe::all();

        return view('etudes/index')->with(['etude' => $etude, 'etudes' => $etudes,'equipes' => $equipes, 'etat' => $etat ]);
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
         DB::table('etudes')
        ->where('id', $id)
        ->update(['libelle' => $request->get('nom'),
                    'type' => $request->get('type'),
                    'date' => $request->get('date'),
                    'equipe_id' => $request->get('equipe')
                ]);

    toastr()->success('Etude modifiée avec succès!');

    return redirect()->route('etudes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = DB::table('etudes')->where('id', '=', $id)->delete();

        if($delete == true){
            toastr()->warning('Suppression effectuée avec succes!');
            return redirect()->route('etudes.index');
        }else{
          toastr()->error('Erreur lors de la suppression!');
            return redirect()->route('etudes.index');
        }
    }
}
