<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $guarded = ['id'];
    
    use HasFactory;

    public function setFilenamesAttribute($value)
    {
        $this->attributes['img_address'] = json_encode($value);
    }
}
