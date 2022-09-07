<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $nbreTotal = nbrePrescripteurs();
        $nbreActifs = nbrePrescripteursActifs();
        $nbreInactifs = nbrePrescripteursInactifs();

        return view('home')->with([
            'nbreTotal' => $nbreTotal,
            'nbreActifs' => $nbreActifs,
            'nbreInactifs' => $nbreInactifs
        ]);
    }
}
