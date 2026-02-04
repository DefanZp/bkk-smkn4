<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class announcement extends Model
{
    protected $table = 'announcements';

    protected $fillable = [
        'headline',
        'content',
        'image',
        'active_until',
    ];

    protected $casts = [
        'content' => 'array',
        'active_until' => 'date',
    ];
}

