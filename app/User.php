<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'nick_name', 'email', 'password', 'avatar', 'about_me'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function own_project()
    {
        return $this->belongsToMany('App\Project', 'project_owners', 'user_id', 'project_id');
    }

    public function sponsor_history()
    {
        return $this->belongsToMany('App\ProjectPackage', 'project_enrolls', 'user_id', 'package_id');
    }

    public function transaction_history()
    {
        return $this->hasMany('App\Transaction');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function comment_replies()
    {
        return $this->hasMany('App\CommentReply');
    }
}
