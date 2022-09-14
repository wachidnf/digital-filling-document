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

    public function parent()
    {
        return $this->belongsTo('App\Models\MStorage', 'parent_id', 'id');
    }

    public function child()
    {
        return $this->hasMany('App\Models\MStorage', 'id', 'parent_id');
    }
}
