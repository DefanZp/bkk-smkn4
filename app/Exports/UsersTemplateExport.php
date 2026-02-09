<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UsersTemplateExport implements FromArray, WithStyles, WithColumnWidths
{


    public function array(): array
    {
        $majors = implode(', ', array_keys(\App\Models\vacancie::MAJORS));
        
        return [
            ['PETUNJUK: Gunakan tanda petik satu (\') sebelum angka NISN agar terbaca sebagai teks. Format Tahun Lulus: YYYY.'],
            ['JURUSAN TERSEDIA: ' . $majors],
            [],
            ['nisn', 'nama_lengkap', 'jurusan', 'tahun_lulus'],
            [
                "'1234567890",
                'Zain artis',
                'Rekayasa Perangkat Lunak',
                '2025',
            ],
            [
                "'0987654321",
                'Rehan Kopling',
                'Teknik Komputer dan Jaringan',
                '2025',
            ],
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Merge instruction row (Row 1)
        $sheet->mergeCells('A1:D1');
        
        // Merge majors info row (Row 2)
        $sheet->mergeCells('A2:D2');

        // Style the instruction row (Row 1)
        $sheet->getStyle('A1')->applyFromArray([
            'font' => [
                'italic' => true,
                'color' => ['rgb' => 'FF0000'], // Red for attention
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'wrapText' => true,
            ],
        ]);
        
        // Style the majors info row (Row 2)
        $sheet->getStyle('A2')->applyFromArray([
            'font' => [
                'italic' => true,
                'bold' => true,
                'color' => ['rgb' => '059669'], // Green
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'wrapText' => true,
            ],
        ]);

        // Style the header row (Row 4) - header is now at row 4
        $sheet->getStyle('A4:D4')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => '4F46E5'],
            ],
        ]);

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
