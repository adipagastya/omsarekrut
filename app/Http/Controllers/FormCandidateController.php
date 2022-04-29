<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\WorkExperience;
use App\Models\WorkField;

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

        // dd($request->toArray()); 
        $validateData = $request->validate([
           
            "name" => "required|max:255",
            "phone" => "required|max:13", 
            "email" => "required|email|unique:users",
            "address" => "required|max:255", 
            "residence_address" => "required|max:255", 
            "place_birth" => "required|max:255", 
            "date_birth" => "required|max:255", 
            "family_name" => "required|max:255", 
            "family_status" => "required|max:255", 
            "family_phone" => "required|max:255", 
            "studies"=> "required|max:255",
            "major" => "required|max:255",
            "edu_level" => "required|max:255",
            "grad_year" => "required|max:255",
            "study_certificate" => "required|image|mimes:jpg|max:1024", 
            "transcript" => "image|mimes:jpg|max:1024",
            "str_certificate" => "image|mimes:jpg|max:1024",
            "personal_id_card" => "required|image|mimes:jpg|max:1024",
            "family_id_card" => "required|image|mimes:jpg|max:1024",
            "skck" => "image|mimes:jpg|max:1024",
            "health_information" => "image|mimes:jpg|max:1024",
            "profile" => "required|image|mimes:jpg|max:1024", 
            "application_date" => "required", 
            "region_id" => "required",
            "workfield_id" => "required",
            "img_address" => "image|mimes:jpg|max:1024",
            "img_address.*" => "image|mimes:jpg|max:1024",

        ]); 

        // dd($validateData); 

        $validateData['certificate_id'] = $this->generateUniqueCode();
        $validateData['work_exp_id'] = $this->generateUniqueCodeForWorkExp();

        $data = [
            [
                'work_name'=>$request->work_name,
                'position'=>$request->position, 
                'start_year'=>$request->start_year,
                'end_year'=>$request->end_year,
                'description'=> $request->description,
                'lead_name'=> $request->lead_name,
                'lead_phone_number'=> $request->lead_phone_number,
                'id_candidate'=> $validateData['work_exp_id'], 
            ], 
            [
                'work_name'=>$request->work_namei,
                'position'=>$request->positioni, 
                'start_year'=>$request->start_yeari,
                'end_year'=>$request->end_yeari,
                'description'=> $request->descriptioni,
                'lead_name'=> $request->lead_namei,
                'lead_phone_number'=> $request->lead_phone_numberi,
                'id_candidate'=> $validateData['work_exp_id'],
       
            ], 
            [
                'work_name'=>$request->work_nameii,
                'position'=>$request->positionii, 
                'start_year'=>$request->start_yearii,
                'end_year'=>$request->end_yearii,
                'description'=> $request->descriptionii,
                'lead_name'=> $request->lead_nameii,
                'lead_phone_number'=> $request->lead_phone_numberii,
                'id_candidate'=> $validateData['work_exp_id'],
       
            ] 
        ];

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

        
         if($request->hasFile('profile')){
            $image = $request->file('profile');
            $name = time().rand(1,100).'.'.$image->extension();
            $image->move(public_path('candidate-image'),$name);
            $validateData['profile']= $name; 
        }

        if($request->hasFile('study_certificate')){
            $image = $request->file('study_certificate');
            $name = time().rand(1,100).'.'.$image->extension();
            $image->move(public_path('candidate-image'),$name);
            $validateData['study_certificate']= $name; 
           
        }

        if($request->hasFile('transcript')){
            $image = $request->file('transcript');
            $name = time().rand(1,100).'.'.$image->extension();
            $image->move(public_path('candidate-image'),$name);
            $validateData['transcript'] = $name; 
           
        }

        if($request->hasFile('personal_id_card')){
            $image = $request->file('personal_id_card');
            $name = time().rand(1,100).'.'.$image->extension();
            $image->move(public_path('candidate-image'),$name);
            $validateData['personal_id_card'] = $name; 
           
        }
  
        if($request->hasFile('family_id_card')){
            $image = $request->file('family_id_card');
            $name = time().rand(1,100).'.'.$image->extension();
            $image->move(public_path('candidate-image'),$name);
            $validateData['family_id_card'] = $name; 
           
        }

        if($request->hasFile('skck')){
            $image = $request->file('skck');
            $name = time().rand(1,100).'.'.$image->extension();
            $image->move(public_path('candidate-image'),$name);
            $validateData['skck'] = $name; 
           
        }

        if($request->hasFile('health_information')){
            $image = $request->file('health_information');
            $name = time().rand(1,100).'.'.$image->extension();
            $image->move(public_path('candidate-image'),$name);
            $validateData['health_information'] = $name; 
           
        }

        if($request->hasFile('str_certificate')){
            $image = $request->file('str_certificate');
            $name = time().rand(1,100).'.'.$image->extension();
            $image->move(public_path('candidate-image'),$name);
            $validateData['str_certificate'] = $name; 
           
        }
  
        
               
        
        Candidate::create($validateData); 
        return redirect('/')->with('success', 'Terimakasih telah melamar di OMSA Medic!'); 

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

    /**p
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

    public function generateUniqueCodeForWorkExp()
    {
        do {
            $code = random_int(100000, 999999);
        } while (Candidate::where("work_exp_id", "=", $code)->first());
  
        return $code;
    }
}
