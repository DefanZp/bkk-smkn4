<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkFill extends Model
{
    protected $table = 'work_fills';

    protected $fillable = [
        'id_user',
        'company_name',
        'position',
        'start_date',
        'salary',
        'location',
        'major_relevance',
    ];

    protected $casts = [
        'start_date' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}

