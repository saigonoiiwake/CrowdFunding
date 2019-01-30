<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $table = 'transaction';

    protected $fillable = [
        'user_id', 'project_id', 'package_id', 'status', 'amount', 'method', 'info'
    ];

    public const STATUS_SUCCESS = 'SUCCESS';
    public const STATUS_FAILED = 'FAILED';
    public const STATUS_PENDING = 'PENDING';

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
