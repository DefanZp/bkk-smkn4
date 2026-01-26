<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'full_name',
        'email',
        'password',
        'nisn', 
        'birth_date',
        'birth_place',
        'address',
        'no_hp',
        'religion',
        'gender',
        'major',
        'CVuser',
        'certificate',
        'status',
        'graduation_year', 
        'role'
    ];
    protected static function booted(): void
{
    static::creating(function ($user) {
        if (empty($user->password)) {
            $user->password = 'pass00' . $user->nisn;
        }
    });
}

    public const MAJORS = [
        'Animasi' => 'Animasi',
        'Desain Komunikasi Visual' => 'Desain Komunikasi Visual',
        'Logistik' => 'Logistik',
        'Perhotelan' => 'Perhotelan',
        'Teknik Grafika' => 'Teknik Grafika',
        'Teknik Komputer dan Jaringan' => 'Teknik Komputer dan Jaringan',
        'Rekayasa Perangkat Lunak' => 'Rekayasa Perangkat Lunak',
    ];

    public const GENDERS = [
        'laki-laki' => 'Laki-laki',
        'perempuan' => 'Perempuan',
    ];

    public const ROLES = [
        'admin' => 'Admin',
        'user' => 'User',
    ];

    public const RELIGIONS = [
        'islam' => 'Islam',
        'protestan' => 'Protestan',
        'kristen' => 'Kristen',
        'buddha' => 'Buddha',
        'hindu' => 'Hindu',
        'konghucu' => 'Konghucu',
    ];

    public const STATUSES = [
        'bekerja' => 'Bekerja',
        'kuliah' => 'Kuliah',
        'wiraswasta' => 'Wiraswasta',
        'menganggur' => 'Menganggur',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
