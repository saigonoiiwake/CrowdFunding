<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    //
    protected $table = 'project_category';

    protected $fillable = [
        'category'
    ];

    public function projects()
    {
        return $this->hasMany('App\Project');
    }
}
