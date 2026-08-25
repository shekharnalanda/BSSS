<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AffiliationApplication extends Model
{
    protected $fillable = [
        'institution_name',
        'institution_type',
        'contact_person',
        'mobile',
        'email',
        'address',
        'district',
        'state',
        'pincode',
        'establishment_year',
        'registration_number',
        'website',
        'courses_or_activities',
        'message',
        'status',
        'admin_note',
    ];
}
