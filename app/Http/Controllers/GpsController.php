<?php

namespace App\Http\Controllers;

use App\Models\Gps;
use App\Models\Client;
use Illuminate\Http\Request;

class GpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gpss = Gps::all();

        return view('gps.gpss',compact('gpss'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        return view('gps.gps',compact('clients'));
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

            'latitude' => ['required' ],
            'longitude' => ['required' ],
            'client_id' => ['required' ],
            
        ]);

        gps::create([
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'client_id' => $request->client_id,
            
        ]);
        //gps::create($request->all());
        return back()->with("success", "gps crée avec success");
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
    public function edit($gpss)
    {
        $gps = gps::find($gpss);
        //dd($gps);
        return view('gps.gps_edit', compact("gps"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $gps)
    {
        $request->validate([

            'latitude' => ['required' ],
            'longitude' => ['required' ],
            'client_id' => ['required' ],
            
        ]);

        // $gps->update([
        //     'latitude' => $request->latitude,
        //     'longitude' => $request->longitude,
        //     'client_id' => $request->client_id,
            
            
        // ]);

        gps::find($gps)->update([
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'client_id' => $request->client_id,
            
            
        ]);
        return back()->with("success", "gps mis a jour avec success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($gps)
    {
        //$nom_complet = $gps->nom ." ". $gps->prenom;
        gps::find($gps)->delete();
        
        return back()->with("successDelete","gps suprimé avec success");
    }
}
