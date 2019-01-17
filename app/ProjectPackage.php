<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectPackage extends Model
{
    //
    protected $fillable = [
        'project_id', 'thumbnail_url', 'title', 'content', 'price', 'quantity',
        'sponsor_count', 'require_info', 'end_date'
    ];
}
