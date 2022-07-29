<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MStorage extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function level_storages()
    {
        return $this->belongsTo('App\Models\LevelStorage', 'level', 'id');
    }

}
