<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UnemployedFill extends Model
{
    protected $table = 'unemployed_fills';

    protected $fillable = [
        'id_user',
        'timespan',
        'reason',
        'activity',
    ];

    public const REASONS = [
        'menunggu informasi perekrutan',
        'berkecukupan',
        'tidak mau bekerja',
        'lainnya',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
