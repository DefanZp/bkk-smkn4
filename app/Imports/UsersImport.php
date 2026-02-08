<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Throwable;
use Carbon\Carbon;

class UsersImport implements ToModel, WithHeadingRow, SkipsOnError
{
    use SkipsErrors;

    public function headingRow(): int
    {
        return 2;
    }

    private array $validMajors = [
        'Animasi',
        'Desain Komunikasi Visual',
        'Logistik',
        'Perhotelan',
        'Teknik Grafika',
        'Teknik Komputer dan Jaringan',
        'Rekayasa Perangkat Lunak',
        'Mekatronika',
    ];
    public function model(array $row)
    {
        if (User::where('nisn', $row['nisn'])->exists()) {
            return null;
        }
        if (!in_array($row['jurusan'], $this->validMajors)) {
            return null;
        }
        $graduationYear = null;
        if (!empty($row['tahun_lulus'])) {
            try {
                $graduationYear = Carbon::parse($row['tahun_lulus'])->format('Y-m-d');
            } catch (\Exception $e) {
                $graduationYear = null;
            }
        }
        return new User([
            'nisn'            => $row['nisn'],
            'full_name'       => $row['nama_lengkap'],
            'major'           => $row['jurusan'],
            'graduation_year' => $graduationYear,
            'password'        => Hash::make('pass00' . $row['nisn']),
            'role'            => 'user',
        ]);
    }
    public function rules(): array
    {
        return [
            'nisn' => 'required|string',
            'nama_lengkap' => 'required|string',
            'jurusan' => 'required|string|in:' . implode(',', $this->validMajors),
            'tahun_lulus' => 'nullable|date',
        ];
    }
    public function customValidationMessages()
    {
        return [
            'jurusan.in' => 'Jurusan tidak valid. Pilihan: Animasi, DKV, Logistik, Perhotelan, Teknik Grafika, TKJ, RPL, Mekatronika',
        ];
    }
}