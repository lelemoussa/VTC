<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Trajet;
use Illuminate\Http\Request;

class TrajetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trajets = Trajet::all();

        return view('trajet.trajets',compact('trajets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        return view('trajet.trajet',compact('clients'));
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

            'depart' => ['required' , 'regex:/^[A-Za-z]+$/' ],
            'arrive' => ['required', 'regex:/^[A-Za-z]+$/'],
            'client_id' => ['required' ],
            
        ]);

        Trajet::create([
            'depart' => $request->depart,
            'arrive' => $request->arrive,
            'client_id' => $request->client_id,
            
        ]);
        //Trajet::create($request->all());
        return back()->with("success", "trajet crée avec success");
        
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
    public function edit(Trajet $trajet)
    {
        $trajets = Trajet::all();
        return view('trajet.trajet_edit', compact("trajet","trajets"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  Trajet $trajet)
    {
        $request->validate([

            'depart' => ['required', 'regex:/^[A-Za-z]+$/' ],
            'arrive' => ['required' , 'regex:/^[A-Za-z]+$/'],
            'client_id' => ['required' ],
            
        ]);

        $trajet->update([
            'depart' => $request->depart,
            'arrive' => $request->arrive,
            'client_id' => $request->client_id,
            
            
        ]);
        return back()->with("success", "trajet modifié avec success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($trajet)
    {
        //$nom_complet = $trajet->nom ." ". $trajet->prenom;
        Trajet::find($trajet)->delete();
        
        return back()->with("successDelete","trajet suprimé avec success");
    }
}
