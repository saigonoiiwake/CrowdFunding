<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProjectCommentReply extends Model
{
    //
    protected $table = 'project_comment_reply';

    protected $fillable = [
        'comment_id', 'user_id', 'reply'
    ];

    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }

    public function speaker()
    {
        return $this->belongsTo('App\User');
    }
}
