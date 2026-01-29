<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CollegeFill extends Model
{
    protected $table = 'college_fills';

    protected $fillable = [
        'id_user',
        'university_name',
        'major',
        'start_date',
        'degre',
    ];

    protected $casts = [
        'start_date' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
