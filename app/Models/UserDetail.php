<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id', 'user_id');
    }

    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id', 'id');
    }

    public function pt()
    {
        return $this->belongsTo('App\Models\Pt', 'pt_id', 'id');
    }

    public function department()
    {
        return $this->belongsTo('App\Models\Department', 'department_id', 'id');
    }

}
