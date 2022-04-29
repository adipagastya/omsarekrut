<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Certificate;
use App\Models\Region;
use App\Models\WorkExperience;
use App\Models\WorkField;
use Faker\Core\File as CoreFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Candidate $candidate, WorkField $workfield, Region $region)
    {
        return view('dashboard.candidates.index', [
            'title' => 'Kandidat',
            'candidateCount' => $candidate,
            'workCount' => $workfield,
            'regions' => $region::all(),
            'workfields' => $workfield::all(),
            'candidates' => $candidate::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Candidate $candidate)
    {
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate, WorkField $workfield, Region $region, WorkExperience $workexp)
    {
        return view('dashboard.candidates.show', [
            'title' => 'Detail Kandidat',
            'candidateCount' => $candidate,
            'regions' => $region::all(),
            'workfields' => $workfield::all(),
            'workexps' => $workexp::all(),
            'workCount' => $workfield,
            'candidate' => $candidate, 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate, WorkField $workfield, Region $region)
    {
        return view('dashboard.candidates.edit', [
            'title' => 'Ubah Status Kandidat',
            'candidateCount' => $candidate,
            'workCount' => $workfield,
            'workfields' => $workfield::all(),
            'regions' => $region::all(),
            'candidate' => $candidate
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidate $candidate)
    {
        $validatedData = $request->validate([
            'status' => 'required'
            
        ]);

        Candidate::where('id', $candidate->id)
            ->update($validatedData);

            return redirect('/dashboard/candidates')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate, WorkExperience $workexperience)
    {
        // $certificates = Certificate::where('id_candidate', '=', $candidate->certificate_id)->get(); 
        // foreach($certificates as $certif){
        //     if(File::exists(public_path('/certificates/'.$certif->img_address))){
        //         File::delete(public_path('/certificates/'.$certif->img_address));
        //     } 
        // }
        // Certificate::where('id_candidate','=', $candidate->certificate_id)->delete();

        Candidate::destroy($candidate->id);

        WorkExperience::where('id_candidate','=', $candidate->work_exp_id)->delete();


        // Storage::delete([$candidate->profile,$candidate->transcript,$candidate->study_certificate]);

        if(File::exists(public_path('/candidate-image/'.$candidate->profile))){
            File::delete(public_path('/candidate-image/'.$candidate->profile));
        }
        if(File::exists(public_path('/candidate-image/'.$candidate->certificate_address))){
            File::delete(public_path('/candidate-image/'.$candidate->certificate_address));
        }
        
        if(File::exists(public_path('/candidate-image/'.$candidate->transcript))){
            File::delete(public_path('/candidate-image/'.$candidate->transcript));
        }

        if(File::exists(public_path('/candidate-image/'.$candidate->study_certificate))){
            File::delete(public_path('/candidate-image/'.$candidate->study_certificate));
        }

        if(File::exists(public_path('/candidate-image/'.$candidate->str_certificate))){
            File::delete(public_path('/candidate-image/'.$candidate->str_certificate));
        }
       
        if(File::exists(public_path('/candidate-image/'.$candidate->personal_id_card))){
            File::delete(public_path('/candidate-image/'.$candidate->personal_id_card));
        }
        if(File::exists(public_path('/candidate-image/'.$candidate->family_id_card))){
            File::delete(public_path('/candidate-image/'.$candidate->family_id_card));
        }
        
        if(File::exists(public_path('/candidate-image/'.$candidate->skck))){
            File::delete(public_path('/candidate-image/'.$candidate->skck));
        }

        if(File::exists(public_path('/candidate-image/'.$candidate->health_information))){
            File::delete(public_path('/candidate-image/'.$candidate->health_information));
        }

        // Storage::delete(public_path().'/candidate-image/'.[$candidate->profile,$candidate->transcript,$candidate->study_certificate]);
        return redirect('/dashboard/candidates')->with('success', 'Data berhasil dihapus');
    }


    public function getImage($certificate_address){
        $path = public_path('/certificates/'.$certificate_address); 
        $headers = ['Content-Type: image/jpeg '];
    
        return  response()->download($path, $certificate_address, $headers);
    }
    
    public function getCandidateImage($imgurl){
        $path = public_path('/candidate-image/'.$imgurl); 
        $headers = ['Content-Type: image/jpeg '];
    
        return  response()->download($path, $imgurl, $headers);
    }
}
