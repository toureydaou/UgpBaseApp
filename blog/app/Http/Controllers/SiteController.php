<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;
use App\Imports\SiteImport;
use App\Models\District;
use App\Models\Region;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sites = Site::all()->sortBy('nom');
        return view('site.index')->with([
            'sites' => $sites,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $regions=Region::all()->sortBy('nom');
        $districts=District::all()->sortBy('nom');

        return view('site.create')->with([
            'regions' => $regions->sortBy('nom'),
            'districts' => $districts->sortBy('nom')
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
        //
        Site::create([
            'nom' => $request->nom,
            'numDistrict' => $request->numDistrict
        ]);

        return redirect()->route('site.create')->with('success', 'Site créé avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Site $site)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site)
    {
        //
    }


    public function retriveDistrict($id) {
       

        $districts = District::where('numRegion', $id)->get();

        // correction du formatage du JSON
        $dataSend = [];
        foreach ($districts as $district) {
            $t = [];
            $t['id'] = $district['id'];
            $t['nom'] = $district['nom'];
            $dataSend[] = $t;
        }
        echo json_encode(['results' => $dataSend]);
    }
}
