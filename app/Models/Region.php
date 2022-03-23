<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Region extends Model
{
    protected $guarded = ['id']; 

    use HasFactory;

    public function getRegion()
    {
        DB::table('regions')->select('*')->get();
    }
}
