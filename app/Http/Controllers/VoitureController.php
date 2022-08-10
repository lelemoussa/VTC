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

            'marque' => ['required', 'regex:/^[A-Za-z]+$/' ],
            'immatriculation' => ['required', 'regex:/^[A-Za-z0-9]+$/' ,'unique:voitures' ],
            'place' => ['required', 'integer'],
            'modele' => ['required', 'string'],
            'couleur' => ['required', 'regex:/^[A-Za-z]+$/' ],
            'description' => ['regex:/^[A-Za-z]+$/'],
            'annee' => ['integer'],


        ]);

        voiture::create([
            'marque' => $request->marque,
            'immatriculation' => $request->immatriculation,
            'place' => $request->place,
            'modele' => $request->modele,
            'couleur' => $request->couleur,
            'description' => $request->description,
            'annee' => $request->annee,
            



            
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

            'marque' => ['required', 'regex:/^[A-Za-z]+$/' ],
            'immatriculation' => ['required', 'regex:/^[A-Za-z0-9]+$/' ],
            'place' => ['required', 'integer'],
            'modele' => ['required', 'string'],
            'couleur' => ['required', 'regex:/^[A-Za-z]+$/' ],
            'description' => ['regex:/^[A-Za-z]+$/'],
            'annee' => ['integer'],




        ]);

        $voiture->update([
            'marque' => $request->marque,
            'immatriculation' => $request->immatriculation,
            'place' => $request->place,
            'modele' => $request->modele,
            'couleur' => $request->couleur,
            'description' => $request->description,
            'annee' => $request->annee,


            
        ]);
        return back()->with("success", "voiture modifié  avec success");
        
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
