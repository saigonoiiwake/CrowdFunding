<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectUpdate extends Model
{
    //
    protected $table = 'project_update';

    protected $fillable = [
        'project_id', 'title', 'content'
    ];

    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
