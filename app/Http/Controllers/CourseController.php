<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\voiture;
use App\Models\chauffeur;
use Illuminate\Http\Request;
use App\Models\Passager;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('course.course',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chauffeurs = chauffeur::all();
        $voitures = voiture::all();
        $passagers = Passager::all();
        return view('course.course',compact('chauffeurs','voitures','passagers'));
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

            'date' => ['required', 'date' ],
            'chauffeur_id' => ['required'],
            'voiture_id' => ['required'],
            'passager_id' => ['required'],
            
        ]);
        
        course::create([
            'date' => $request->date,
            'chauffeur_id' => $request->chauffeur_id,
            'voiture_id' => $request->voiture_id,
            'passager_id' => $request->passager_id,
            
            
        ]);
        //course::create($request->all());
        return back()->with("success", "course crée avec success");
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
    public function edit(course $course)
    {
        $courses = course::all();
        return view('course.course_edit', compact("course","courses"));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  course $course)
    {
        $request->validate([

            'date' => ['required' ],
            'chauffeur_id' => ['required'],
            'voiture_id' => ['required'],
            'passager_id' => ['required'],
            
        ]);

        $course->update([
            'date' => $request->date,
            'chauffeur_id' => $request->chauffeur_id,
            'voiture_id' => $request->voiture_id,
            'passager_id' => $request->passager_id,
            
            
            
        ]);
        return back()->with("success", "course mis a jour avec success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($course)
    {
        //$nom_complet = $course->nom ." ". $course->prenom;
        course::find($course)->delete();
        
        return back()->with("successDelete","course suprimé avec success");
    }
}
