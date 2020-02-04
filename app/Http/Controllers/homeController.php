<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\Etudes;
use App\Equipe;
use App\Personnel;

class homeController extends Controller
{
	public function index()
	{
		$equipes = Equipe::with('personnels')->get();$personnels = Personnel::all();
   		return view('home')->with(['equipes'=>$equipes, 'personnels' => $personnels]);
	}
}
