<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WorkField extends Model
{
    protected $guarded = ['id']; 

    use HasFactory;

    public function getWorkField()
    {
        DB::table('work_fields')->select('*')->get();
    }
}
