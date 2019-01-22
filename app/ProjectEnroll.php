<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectEnroll extends Model
{
    //
    protected $table = 'project_enroll';

    protected $fillable = [
        'user_id', 'project_id', 'package_id'
    ];
}
