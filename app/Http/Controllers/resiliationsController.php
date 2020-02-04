<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Resiliations;
use App\Equipe;
use Auth;
use Session;

class resiliationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etat = 'liste';
        $resiliations = Resiliations::all();
        $equipes = Equipe::all();
         return view('resiliations/index')->with([
            'resiliations' => $resiliations,'equipes' => $equipes,'etat' => $etat
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       DB::table('resiliations')->insert(['numero' => $request->get('numero'),
        'raison' => $request->get('raison'),
        'date' => $request->get('date'),
        'equipe_id' => $request->get('equipe'),
        ]);

            toastr()->success('Résiliation crée avec succès!');

            return redirect()->route('resiliations.index');
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
        $resiliation = Resiliations::with('equipe')->findOrFail($id);
        $resiliations = Resiliations::with('equipe')->get();
        $equipes = Equipe::all();

        return view('resiliations/index')->with(['resiliation' => $resiliation, 'resiliations' => $resiliations,'equipes' => $equipes, 'etat' => $etat ]);
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
        DB::table('resiliations')
        ->where('id', $id)
        ->update(['numero' => $request->get('numero'),
                    'raison' => $request->get('raison'),
                    'date' => $request->get('date'),
                    'equipe_id' => $request->get('equipe')
                ]);

    toastr()->success('Resiliation modifiée avec succès!');

    return redirect()->route('resiliations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $delete = DB::table('resiliations')->where('id', '=', $id)->delete();

        if($delete == true){
            toastr()->warning('Suppression effectuée avec succes!');
            return redirect()->route('etudes.index');
        }else{
          toastr()->error('Erreur lors de la suppression!');
            return redirect()->route('resiliations.index');
        }
    }
}
