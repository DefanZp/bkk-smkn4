<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'id_vacancy',
        'id_user',
        'id_company',
        'status',

            
    ];

    public const STATUSES = [
        "dikirim" => "Dikirim",
        "diproses" => "Diproses",
        "diterima" => "Diterima",
        "ditolak" => "Ditolak",
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function vacancy()
    {
        return $this->belongsTo(Vacancie::class, 'id_vacancy');
    }
    public function company()
    {
        return $this->belongsTo(companie::class, 'id_company');
    }
}
