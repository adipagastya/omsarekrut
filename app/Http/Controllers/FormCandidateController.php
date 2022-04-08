<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\WorkExperience;

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
        $validateData = $request->validate([
           
            "name" => "required|max:255",
            "phone" => "required|max:13", 
            "email" => "required|email|unique:users",
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
            "region_id" => "required",
            "workfield_id" => "required",
            "img_address" => "required",
            "img_address.*" => "required",

        ]); 

        $validateData['certificate_id'] = $this->generateUniqueCode();
        $validateData['work_exp_id'] = $this->generateUniqueCode();

        // if($request->file('profile')){
        //     $validateData['profile'] = $request->file('profile')->store('candidate-images'); 
        // }

        // if($request->file('study_certificate')){
        //     $validateData['study_certificate'] = $request->file('study_certificate')->store('candidate-images'); 
        // }

        // if($request->file('transcript')){
        //     $validateData['transcript'] = $request->file('transcript')->store('candidate-images'); 
        // }

        $data = [
            ['name'=>$request->work_name, 'year'=> $request->work_year, 'description'=> $request->description, 'id_candidate'=> $validateData['work_exp_id']],
            ['name'=>$request->work_name1, 'year'=> $request->work_year1, 'description'=> $request->description1, 'id_candidate'=> $validateData['work_exp_id']],
            ['name'=>$request->work_name2, 'year'=> $request->work_year2, 'description'=> $request->description2, 'id_candidate'=> $validateData['work_exp_id']],
        ];

        // WorkExperience::insert($data);
        WorkExperience::insert($data);

        $certificates = [];
        if($request->file('img_address'))
         {

            foreach($request->file('img_address') as $certificate)
            {
                $name = time().rand(1,100).'.'.$certificate->extension();
                $certificate->move(public_path('certificates'), $name);    
               

                $certificateobject = new Certificate();
                $certificateobject ->img_address = $name;
                $certificateobject ->id_candidate = $validateData['certificate_id'];
                $certificateobject ->save();
            }
            
         }
  
        
               
        
        Candidate::create($validateData); 
        return redirect('/')->with('success', 'Terimakasih telah melamar di OMSA Medic!, lamaran anda akan kami review terlebih dahulu. Jika sudah memenuhi kriteria kami akan segera munghubungi anda :)'); 

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

    public function generateUniqueCode()
    {
        do {
            $code = random_int(100000, 999999);
        } while (Candidate::where("certificate_id", "=", $code)->first());
  
        return $code;
    }
}
