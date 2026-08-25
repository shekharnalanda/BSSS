<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MembershipApplication extends Model
{
    protected $fillable = [
        'membership_type_id',
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
        'message',
        'status',
        'admin_note',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];

    public function membershipType(): BelongsTo
    {
        return $this->belongsTo(MembershipType::class);
    }
}
