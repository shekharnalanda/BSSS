<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AffiliatedInstitution extends Model
{
    protected $fillable = [
        'affiliation_application_id',
        'affiliation_number',
        'institution_name',
        'institution_type',
        'contact_person',
        'mobile',
        'email',
        'address',
        'district',
        'state',
        'pincode',
        'registration_number',
        'website',
        'affiliated_on',
        'valid_until',
        'status',
    ];

    protected $casts = [
        'affiliated_on' => 'date',
        'valid_until' => 'date',
    ];

    public function application(): BelongsTo
    {
        return $this->belongsTo(
            AffiliationApplication::class,
            'affiliation_application_id'
        );
    }
}
