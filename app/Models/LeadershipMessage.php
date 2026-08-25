<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadershipMessage extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'title',
        'message',
        'photo',
        'mobile',
        'is_featured',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];
}
