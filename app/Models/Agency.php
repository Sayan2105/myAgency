<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    protected $fillable = [
        'name',
        'company_type',
        'instagram_url',
        'website_url',
        'location',
        'specialization',
        'followers',
        'website_quality',
        'priority',
        'status',
        'last_contacted_at',
        'follow_up_at',
        'notes',
    ];
}
