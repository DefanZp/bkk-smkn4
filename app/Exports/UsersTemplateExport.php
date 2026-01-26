<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UsersTemplateExport implements FromArray, WithHeadings, WithStyles, WithColumnWidths
{
    public function headings(): array
    {
        return [
            'nisn',
            'nama_lengkap',
            'jurusan',
            'tahun_lulus',
        ];
    }

    public function array(): array
    {
        return [
            [
                '1234567890',
                'Zain artis',
                'Rekayasa Perangkat Lunak',
                '2025-04-25',
            ],
            [
                '0987654321',
                'Rehan Kopling',
                'Teknik Komputer dan Jaringan',
                '2025-04-25',
            ],
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:D1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => '4F46E5'],
            ],
        ]);

        $sheet->getComment('C1')->getText()->createTextRun(
            "Pilihan jurusan yang valid:\n" .
            "- Animasi\n" .
            "- Desain Komunikasi Visual\n" .
            "- Logistik\n" .
            "- Perhotelan\n" .
            "- Teknik Grafika\n" .
            "- Teknik Komputer dan Jaringan\n" .
            "- Rekayasa Perangkat Lunak"
        );

        $sheet->getComment('D1')->getText()->createTextRun(
            "Format tanggal: YYYY-MM-DD\nContoh: 2025-04-25"
        );

        return [];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 15,  // nisn
            'B' => 25,  // nama_lengkap
            'C' => 35,  // jurusan
            'D' => 15,  // tahun_lulus
        ];
    }
}
