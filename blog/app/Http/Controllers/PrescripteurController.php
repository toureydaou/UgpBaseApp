<?php

namespace App\Http\Controllers;

use App\Models\Prescripteur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PrescripteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $code = generateString(6);
        return view('prescripteurs.create')->with('code', $code);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation du formulaire

        $request->validate([
            'nom' => 'bail|required|string|min:3',
            'prenom' => 'bail|required|string|min:3',
            'email' => 'bail|required|email',
            'dateDebut' => 'bail|required|date|before:dateFin',
            'dateFin' => 'bail|required|date|after:dateDebut',
            'avatar' => 'bail|file|image|max:700',
            'formation' => 'bail|string',
            'adresse' => 'string|min:5'
        ]);


        // Enregistrement de la photo

        $image = $request->file('avatar');
        $request['avatar'] = $image->storeAs('profils', $request->nom . $request->prenom . '.' . $image->extension()) ;


        // Hashage du code de connexion

        $request['code'] = Hash::make($request->code);

        // Enregistrement du prescripteur en base

        Prescripteur::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'sexe' => $request->sexe,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'dateDebut' => $request->dateDebut,
            'dateFin' => $request->dateFin,
            'site' => $request->site,
            'actif' => $request->actif,
            'formation' => $request->formation,
            'code' => $request->code,
            'avatar' => $request->avatar
        ]);

        // Récupération du prescripteur pour son id

        $prescripteur = Prescripteur::where('telephone', $request->telephone)->first();

        
        
        // Création de l'utilisateur et enregistrement en base

        User::create([
            'name' => $request->nom,
            'email' => $request->email,
            'password' => $request->code,
            'profil' => $request->profil,
            'numPrescripteur' => $prescripteur['id']
        ]);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prescripteur  $prescripteur
     * @return \Illuminate\Http\Response
     */
    public function show(Prescripteur $prescripteur)
    {
        //
        return view('prescripteurs.show')->with('prescripteur', $prescripteur);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prescripteur  $prescripteur
     * @return \Illuminate\Http\Response
     */
    public function edit(Prescripteur $prescripteur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prescripteur  $prescripteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prescripteur $prescripteur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prescripteur  $prescripteur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prescripteur $prescripteur)
    {
        //
    }
}
