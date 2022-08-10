<?php

namespace App\Http\Controllers;

use App\Models\chauffeur;
use Illuminate\Http\Request;

class ChauffeurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chauffeurs = chauffeur::all();

        return view('chauffeur.chauffeurs',compact('chauffeurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('chauffeur.chauffeur');
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

            'nom' => ['required', 'regex:/^[A-Za-z]+$/'],
            'prenom' => ['required','regex:/^[A-Za-z]+$/' ],
            'matricule' => ['required','unique:chauffeurs' ],
            'permis' => ['numeric','unique:chauffeurs' ],
            'telephone' => ['numeric','min:10','unique:chauffeurs' ],
            'civilite' => ['regex:/^[A-Za-z]+$/'],


        ]);

        chauffeur::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'matricule' => $request->matricule,
            'permis' => $request->permis,
            'telephone' => $request->telephone,
            'civilite' => $request->civilite,

        ]);
        return back()->with("success", "chauffeur crée avec success");
        
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
    public function edit(chauffeur $chauffeur)
    {
        
        return view('chauffeur.chauffeur_edit', compact("chauffeur"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, chauffeur $chauffeur)
    {
        $request->validate([

            'nom' => ['required', 'regex:/^[A-Za-z]+$/'],
            'prenom' => ['required','regex:/^[A-Za-z]+$/' ],
            'matricule' => ['required'],
            'permis' => ['numeric'],
            'telephone' => ['numeric','min:10'],
            'civilite' => ['regex:/^[A-Za-z]+$/'],


        ]);

        $chauffeur->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'matricule' => $request->matricule,
            'permis' => $request->permis,
            'telephone' => $request->telephone,
            'civilite' => $request->civilite,

            
        ]);
        return back()->with("success", "chauffeur mis a jour avec success");
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($chauffeur)
    {
        //$nom_complet = $chauffeur->nom ." ". $chauffeur->prenom;
        chauffeur::find($chauffeur)->delete();
        
        return back()->with("successDelete","chauffeur suprimé avec success");
    }
}
