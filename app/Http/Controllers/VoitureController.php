<?php

namespace App\Http\Controllers;

use App\Models\voiture;
use Illuminate\Http\Request;

class voitureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voitures = voiture::all();

        return view('voiture.voitures',compact('voitures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('voiture.voiture');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'marque' => ['required' ],
            'immatriculation' => ['required' ,'unique:voitures' ],
            'place' => ['required'],
            'description' => ['required' ],
            'modele' => ['required'],
            'annee' => ['required'],
            'couleur' => ['required' ],


        ]);

        voiture::create([
            'marque' => $request->marque,
            'immatriculation' => $request->immatriculation,
            'place' => $request->place,
            'description' => $request->description,
            'modele' => $request->modele,
            'annee' => $request->annee,
            'couleur' => $request->couleur,



            
        ]);
        return back()->with("success", "voiture crée avec success");
        
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
    public function edit(voiture $voiture)
    {
        
        return view('voiture.voiture_edit', compact("voiture"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, voiture $voiture)
    {
        $request->validate([

            'marque' => ['required' ],
            'immatriculation' => ['required' ,'unique:voitures' ],
            'place' => ['required'],
            'description' => ['required' ],
            'modele' => ['required'],
            'annee' => ['required'],
            'couleur' => ['required' ],


        ]);

        $voiture->update([
            'marque' => $request->marque,
            'immatriculation' => $request->immatriculation,
            'place' => $request->place,
            'description' => $request->description,
            'modele' => $request->modele,
            'annee' => $request->annee,
            'couleur' => $request->couleur,


            
        ]);
        return back()->with("success", "voiture mis a jour avec success");
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($voiture)
    {
        //$nom_complet = $voiture->nomch ." ". $voiture->prenomch;
        voiture::find($voiture)->delete();
        
        return back()->with("successDelete","voiture suprimé avec success");
    }
}
