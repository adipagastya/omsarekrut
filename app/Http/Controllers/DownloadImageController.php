<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadImageController extends Controller
{
    public function getImage($imagename){
        // $path = public_path('/storage/'.$imagename); 
        // $path = public_path('/img/avatar2.png'); 
        $headers = ['Content-Type: image/jpeg '];
        // $headers = ['Content-Type: image/png'];
        $path = storage_path('app/public/storage/'.$imagename);
        // return response()->download($path, $imagename, $headers);
        return Storage::download($imagename, $imagename, $headers);
    //    return response()->download($path, $imagename, $headers); 
    }
}
