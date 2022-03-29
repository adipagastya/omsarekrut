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

        dd($request); 
        
        $validateData = $request->validate([
            "profile" => "required|image|file|max:1024",
            "name" => "required|max:255",
            "phone" => "required|numeric|max:13", 
            "email" => "required|email:dns",
            "placeofbirth" => "required|max:255", 
            "dateofbirth" => "required|max:255", 
            "studies"=> "required|max:255",
            "major" => "required|max:255",
            "edulevel" => "required|max:255",
            "gradyear" => "required|max:255",
            "certif_study" => "required|image|file|max:1024", 
            "transcript" => "required|image|file|max:1024", 

        ]); 

        if($request->file('profile')){
            $validateData['profile'] = $request->file('profile')->store('candidate-images'); 
        }

        if($request->file('certif_study')){
            $validateData['certif_study'] = $request->file('certif_study')->store('candidate-images'); 
        }

        if($request->file('transcript')){
            $validateData['transcript'] = $request->file('transcript')->store('candidate-images'); 
        }

        dd($validateData); 
        
        // Candidate::create($validateData); 
        // return redirect('/')->with('success', 'New post has been added'); 

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
