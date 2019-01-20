<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    //
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
