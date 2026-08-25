<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Member extends Model
{
    protected $fillable = [
        'membership_application_id',
        'membership_type_id',
        'membership_number',
        'name',
        'mobile',
        'email',
        'father_or_spouse_name',
        'date_of_birth',
        'occupation',
        'institution_name',
        'address',
        'district',
        'state',
        'pincode',
        'photo',
        'joined_on',
        'valid_until',
        'status',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'joined_on' => 'date',
        'valid_until' => 'date',
    ];

    public function membershipType(): BelongsTo
    {
        return $this->belongsTo(MembershipType::class);
    }

    public function application(): BelongsTo
    {
        return $this->belongsTo(MembershipApplication::class, 'membership_application_id');
    }
}
