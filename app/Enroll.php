<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    //
    protected $fillable = [
        'user_id', 'package_id'
    ];
}
