<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectOwner extends Model
{
    //

    protected $table = 'project_owner';

    protected $fillable = [
        'user_id', 'project_id'
    ];
}
