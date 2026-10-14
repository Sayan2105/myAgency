<?php

namespace App\Models;

use App\Enums\LeadStatus;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = [
        'name',
        'contact',
        'message',
        'source',
        'status',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'status' => LeadStatus::class,
        ];
    }
}
