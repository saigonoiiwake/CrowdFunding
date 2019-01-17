<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = [
        'category_id', 'title', 'video_url', 'owners', 'description',
        'funding_target', 'start_date', 'end_date'
    ];
}
