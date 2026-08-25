<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommitteeMember extends Model
{
    protected $fillable = [
        'committee_id',
        'designation',
        'name',
        'mobile',
        'alternate_mobile',
        'photo',
        'is_authorized_person',
        'is_featured',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_authorized_person' => 'boolean',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function committee(): BelongsTo
    {
        return $this->belongsTo(Committee::class);
    }
}
