<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $fillable = [
        'user_id', 'package_id', 'status', 'amount', 'method', 'info'
    ];
}
