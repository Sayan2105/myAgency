<?php

namespace App\Models;

use App\Enums\LeadStatus;
use App\Enums\Priority;
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

    protected function casts(): array
    {
        return [
            'status' => LeadStatus::class,
            'priority' => Priority::class,
            'last_contacted_at' => 'datetime',
            'follow_up_at' => 'datetime',
        ];
    }

    /**
     * Call this right after you reach out: stamps today and sets the next follow-up.
     */
    public function markContacted(int $followUpInDays = 3): void
    {
        $this->update([
            'status' => $this->status === LeadStatus::New ? LeadStatus::Contacted : $this->status,
            'last_contacted_at' => now(),
            'follow_up_at' => now()->addDays($followUpInDays),
        ]);
    }
}
