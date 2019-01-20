<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'project_id', 'user_id', 'comment'
    ];

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function speaker()
    {
        return $this->belongsTo('App\User');
    }

    public function replies()
    {
        return $this->hasMany('App\CommentReply');
    }
}
