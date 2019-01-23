<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectQuestion extends Model
{
    //
    protected $table = 'project_question';

    protected $fillable = [
        'project_id', 'question', 'answer'
    ];

    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
