<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Crypt;

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

    public function getIdEncryptAttribute(){
        return Crypt::encryptString($this->id);
    }

    public function getLinkQrcodeAttribute(){
        return url('/')."/view-document-direct?id=".$this->id;
    }
}
