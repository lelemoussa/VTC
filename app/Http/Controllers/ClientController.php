<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();

        return view('client.clients',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.client');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Client $client)
    {
        $request->validate([

            'nom' => ['required' , 'regex:/^[A-Za-z]+$/'],
            'telephone' => ['numeric','min:10','unique:clients' ],
            'email' => ['email','unique:clients'],
            //'prenom' => ['regex:/^[A-Za-z]+$/'],
            //'societe' => ['regex:/^[A-Za-z]+$/' ],
            //'civilite' => ['regex:/^[A-Za-z]+$/' ],

        ]);
        

        $client->create($request->except(['_token']));
        return back()->with("success", "client crée avec success");
        
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
    public function edit(Client $client)
    {
        return view('client.client_edit', compact("client"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([

            'nom' => ['required' , 'regex:/^[A-Za-z]+$/'],
            'telephone' => ['numeric','min:10' ],
            'email' => ['email'],
             //'prenom' => ['regex:/^[A-Za-z]+$/'],
            //'societe' => ['regex:/^[A-Za-z]+$/' ],
            //'civilite' => ['regex:/^[A-Za-z]+$/' ],

        ]);

        // $client->update([
        //     'nom' => $request->nom,
        //     'prenom' => $request->prenom,
        //     'telephone' => $request->telephone,
        //     'societe' => $request->societe,
        //     'email' => $request->email,
        //     'civilite' => $request->civilite,
            
        // ]);
        $client->update($request->all());
        return back()->with("success", "client mis a jour avec success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($client)
    {
        //$nom_complet = $client->nom ." ". $client->prenom;
        Client::find($client)->delete();
        
        return back()->with("successDelete","client suprimé avec success");
    }
}
