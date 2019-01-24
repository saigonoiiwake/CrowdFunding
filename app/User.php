<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'user';

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    // Disable auto increment `id` field
    public $incrementing = false;


    protected $fillable = [
        'id', 'name', 'nick_name', 'email', 'password', 'avatar', 'about_me'
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
        return $this->belongsToMany('App\ProjectPackage', 'project_enroll', 'user_id', 'package_id');
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

    public static function newUser($param)
    {
        // Mail::to($param['email'])
        //       ->bcc('b816132@gmail.com')
        //       ->send(new \App\Mail\RegisterSuccessful());
        
        return parent::create([
            'id'        => self::generateIdSafe(),
            'name'      => $param['nick_name'],
            'nick_name' => $param['nick_name'],
            'avatar'    => isset($param['avatar'])?  $param['avatar'] : "https://res.cloudinary.com/sabina123/image/upload/v1533396487/%E8%8F%AF%E5%A4%A7%E9%A0%AD.jpg",
            'email'     => $param['email'],
            'password'  => bcrypt($param['password']),
            'about_me'  => '這是我的介紹'
        ]);
    }

    /**
     * generate 10 digit ID
     *
     * @return int
     */
    public static function generateId()
    {
        return (int)mt_rand(100000000, 999999999);
    }

    /**
     * generate 10 digit no duplicated ID
     *
     * @param int $retry
     * @return int
     * @throws
     */
    public static function generateIdSafe($retry = 15)
    {
        if ($retry <= 0) {
            // TODO: find the proper exception when ID can't be generate
            throw new ModelNotFoundException();
        }
        $id = self::generateId();
        try {
            self::query()
                ->where('id', '=',$id)
                ->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return $id;
        }
        // "[DuplicationUserId] {$id}"
        return self::generateIdSafe($retry - 1);
    }

}
