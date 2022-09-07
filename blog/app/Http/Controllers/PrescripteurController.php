<?php

namespace App\Http\Controllers;

use App\Mail\ConnectionCode;
use App\Models\Prescripteur;
use App\Models\Site;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PrescripteurController extends Controller
{
    public function showInscription(){

        // affichage du formulaire d'ajout d'un utilisateur

        return view('prescripteurs.inscription');
    }

    public function inscription(Request $request){

        // validation du formulaire

        $request->validate([
            'email' => 'bail|required|email',
        ]);


        // génération du code et envoi du mail

        $code = generateString(6);

        // creation de l'utilisateur
        User::create([
            'email' => $request->email,
            'profil' => $request->profil,
            'password' => Hash::make($code)
        ]);

        $user = User::where('email', $request->email)->first();

        Prescripteur::create([
            'email' => $request->email,
            'actif' => true,
            'numUser' => $user->id
        ]);
        

        // envoi du mail
        Mail::to($request->email)->send(new ConnectionCode($code));

        // redirection vers la page d'ajout d'utilisateur
        return redirect()->route('inscription')->with('success', 'Email envoyé avec succès !');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prescripteurs = Prescripteur::all();
        
        return view('prescripteurs.index')->with(['prescripteurs' => $prescripteurs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sites = Site::all();
        $prescripteur = Prescripteur::where('numUser', Auth::user()->id)->first();
        
        
        

        return view('prescripteurs.create')
                ->with([
                        'sites' => $sites->sortBy('nom'),
                        'prescripteur' => $prescripteur
                    ]);
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
            'dateDebut' => 'bail|required|date',
            'avatar' => 'bail|file|image|max:700',
            'adresse' => 'string|min:3'
        ]);


        // Enregistrement de la photo (si fournie)

        if ($request->file != null) {
            $image = $request->file('avatar');
            $request['avatar'] = $image->storeAs('profils', $request->nom . $request->prenom . '.' . $image->extension());
        }

        //ddd($request->avatar);

        // Récupération de l'id du prescripteur via son email

        $prescripteur = Prescripteur::where('email', Auth::user()->email)->first();

        $prescripteur->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'sexe' => $request->sexe,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'dateDebut' => $request->dateDebut,
            'numSite' => $request->numSite,
            'avatar' => $request->avatar
        ]);



        // Création de l'utilisateur et enregistrement en base

        $user=User::where('email', Auth::user()->email)->first();
        
        $user->update([
            'numPrescripteur' => $prescripteur['id']
        ]);

        return redirect()->route('home')->with('success', 'Informations modifiées avec succès !');
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
    public function destroy(Prescripteur $prescripteur, Request $request)
    {
        //
        if ($request->activation === "true") {
            $prescripteur->update([
                'actif' => true,
                'dateFin' => null
            ]);
            $prescripteur->save();

        } else {
            $prescripteur->update([
                'actif' => false,
                'dateFin' => date('d-m-Y')
            ]);
            $prescripteur->save();
        }
        

        

        return redirect()->route('prescripteurs.index');
    }
}
