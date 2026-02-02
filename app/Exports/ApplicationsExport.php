<?php
namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Collection;
class ApplicationsExport implements FromCollection, WithHeadings, WithMapping
{
    protected Collection $applications;
    public function __construct(Collection $applications)
    {
        $this->applications = $applications;
    }
    public function collection()
    {
        return $this->applications;
    }
    public function headings(): array
    {
        return [
            'No',
            'Nama Lengkap',
            'NISN',
            'NIK',
            'Jurusan',
            'Tahun Lulus',
            'No. HP',
            'Email',
            'Alamat',
            'Gender',
            'Tanggal Melamar',
            'Ada CV',
            'Ada Sertifikat',
        ];
    }
    public function map($application): array
    {
        static $no = 0;
        $no++;
        
        return [
            $no,
            $application->user->full_name ?? '-',
            $application->user->nisn ?? '-',
            $application->user->nik ?? '-',
            $application->user->major ?? '-',
            $application->user->graduation_year ?? '-',
            $application->user->no_hp ?? '-',
            $application->user->email ?? '-',
            $application->user->address ?? '-',
            $application->user->gender ?? '-',
            $application->created_at->format('d/m/Y'),
            $application->user->CVuser ? '✓' : '-',
            $application->user->certificate ? '✓' : '-',
        ];
    }
}