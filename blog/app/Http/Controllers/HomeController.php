<?php

namespace App\Http\Controllers;

use App\Models\Prescripteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $user = Prescripteur::where('email', Auth::user()->email)->first();

        
        
        $nbreTotal = nbrePrescripteurs();
        $nbreActifs = nbrePrescripteursActifs();
        $nbreInactifs = nbrePrescripteursInactifs();

        return view('home')->with([
            'nbreTotal' => $nbreTotal,
            'nbreActifs' => $nbreActifs,
            'nbreInactifs' => $nbreInactifs,
            'user' => $user
        ]);
    }
}
