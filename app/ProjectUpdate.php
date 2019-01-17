<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectUpdate extends Model
{
    //
    protected $fillable = [
        'project_id', 'title', 'content'
    ];
}
