<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectPackage extends Model
{
    //
    protected $table = 'project_package';

    protected $fillable = [
        'project_id', 'thumbnail_url', 'title', 'content', 'price', 'quantity',
        'sponsor_count', 'require_info', 'end_date'
    ];

    public function project()
    {
        return $this->belongsTo('App\Project', 'project_id', 'id');
    }

    public function sponsors()
    {
        return $this->belongsToMany('App\User', 'project_enrolls', 'package_id', 'user_id');
    }
}
