<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EntrepreneurFill extends Model
{
    // Nama tabel di database adalah entrepeneur_fills (typo di migration)
    protected $table = 'entrepeneur_fills';

    protected $fillable = [
        'id_user',
        'company_name',
        'field',
        'start_date',
        'salary',
        'location',
        'major_relevance',
        'sosial_media',
    ];

    protected $casts = [
        'start_date' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
