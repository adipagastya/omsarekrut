<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Models\Region;

class FormCandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('form', [
            'title' => 'Rekruitment',
            'regions' => Region::all()
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request); 
        // "profile" => "required|image|file",
        $validateData = $request->validate([
           
            "name" => "required|max:255",
            "phone" => "required|max:13", 
            "email" => "required",
            "place_birth" => "required|max:255", 
            "date_birth" => "required|max:255", 
            "studies"=> "required|max:255",
            "major" => "required|max:255",
            "edu_level" => "required|max:255",
            "grad_year" => "required|max:255",
            "study_certificate" => "required|image|file", 
            "transcript" => "required|image|file", 
            "profile" => "required|image|file", 
            "application_date" => "required", 
            "workfield_id" => "required", 

        ]); 

        if($request->file('profile')){
            $validateData['profile'] = $request->file('profile')->store('candidate-images'); 
        }

        if($request->file('study_certificate')){
            $validateData['study_certificate'] = $request->file('study_certificate')->store('candidate-images'); 
        }

        if($request->file('transcript')){
            $validateData['transcript'] = $request->file('transcript')->store('candidate-images'); 
        }

        // dd($validateData); 
        
        Candidate::create($validateData); 
        return redirect('/')->with('success', 'New post has been added'); 

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
