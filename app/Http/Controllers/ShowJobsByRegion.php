<?php

namespace App\Http\Controllers;

use App\Models\WorkField;
use Illuminate\Http\Request;

class ShowJobsByRegion extends Controller
{
    public function showJobsByRegion($regionid){
        // dd($regionid); 
        $work_filed = WorkField::where('region_id',$regionid)->get();
        $data = $work_filed->toArray(); 

      return response()->json($data);

    }
}
