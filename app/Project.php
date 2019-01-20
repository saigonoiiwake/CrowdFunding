<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = [
        'category_id', 'title', 'video_url', 'description',
        'funding_target', 'start_date', 'end_date', 'content'
    ];

    public function category()
    {
        return $this->hasOne('App\ProjectCategory');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function updates()
    {
        return $this->hasMany('App\ProjectUpdate');
    }

    public function packages()
    {
        return $this->hasMany('App\ProjectPackage');
    }

    public function owners()
    {
        return $this->belongsToMany('App\User', 'project_owners', 'project_id', 'user_id');
    }

    public function sponsors()
    {
        return $this->belongsToMany('App\User', 'project_enrolls', 'project_id', 'user_id');
    }
}
