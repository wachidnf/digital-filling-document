<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailDocument extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function attachment()
    {
        return $this->hasMany('App\Models\Attachment','source_id',"id")->where("type","detail document");
    }
}
