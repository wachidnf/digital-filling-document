<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public function lokasi()
    {
        return $this->belongsTo('App\Models\Storage');
    }

    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }
}
