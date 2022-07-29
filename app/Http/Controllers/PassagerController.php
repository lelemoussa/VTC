<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Passager;
use Illuminate\Http\Request;

class PassagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $passagers = Passager::all();

        return view('passager.passagers',compact('passagers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        return view('passager.passager',compact('clients'));
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

            'nom' => ['required' , 'string'],
            'prenom' => ['required' , 'string'],
            'telephone' => ['required','numeric','min:10','unique:clients' ],
            'societe' => ['required' ,'string' ],
            'email' => ['required','email','unique:clients' ],
            'civilite' => ['required' ,'string' ],
            'client_id' => ['required' ],
            
        ]);

        passager::create([
            'nom' => $request->nom,
            'arrive' => $request->arrive,
            'prenom' => $request->prenom,
            'telephone' => $request->telephone,
            'societe' => $request->societe,
            'email' => $request->email,
            'civilite' => $request->civilite,
            'client_id' => $request->client_id,
            
        ]);
        //passager::create($request->all());
        return back()->with("success", "passager crée avec success");
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
    public function edit(passager $passager)
    {
        $passagers = passager::all();
        return view('passager.passager_edit', compact("passager","passagers"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, passager $passager)
    {
        $request->validate([

            'nom' => ['required' , 'string'],
            'prenom' => ['required' , 'string'],
            'telephone' => ['required','numeric','min:10' ],
            'societe' => ['required' ,'string' ],
            'email' => ['required','email' ],
            'civilite' => ['required' ,'string' ],
            'client_id' => ['required' ],
            
        ]);

        $passager->update([
            'nom' => $request->nom,
            'arrive' => $request->arrive,
            'prenom' => $request->prenom,
            'telephone' => $request->telephone,
            'societe' => $request->societe,
            'email' => $request->email,
            'civilite' => $request->civilite,
            'client_id' => $request->client_id,
            
            
        ]);
        return back()->with("success", "passager mis a jour avec success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($passager)
    {
        //$nom_complet = $passager->nom ." ". $passager->prenom;
        passager::find($passager)->delete();
        
        return back()->with("successDelete","passager suprimé avec success");
    }
}
