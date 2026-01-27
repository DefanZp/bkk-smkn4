<?php

namespace App\Livewire\Profil;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Dokumen Pendukung - BKK SMKN 4 MALANG')]
#[Layout('layouts.app')]
class SupportingDocuments extends Component
{
    public $documentContent = [
        [
            'type' => 'manyContent',
            'title' => 'Sarana dan Prasarana',
            'content' => 'Berikut merupakan sarana dan prasarana penunjang kegiatan BKK SMK Negeri 4 Malang:',
            'device_items' => [
                [
                    'device_name' => 'Alat Komunikasi (Tablet)',
                    'image' => '/assets/static/partial/Tablet.png',
                    'device_description' => 'Mempermudah interaksi dan komunikasi dalam pelayanan',
                ],
                [
                    'device_name' => 'Smart TV / Android TV',
                    'image' => '/assets/static/partial/Tv.png',
                    'device_description' => 'Menampilkan informasi dan lowongan kerja kepada siswa',
                ],
                [
                    'device_name' => 'Laptop dan Printer',
                    'image' => '/assets/static/partial/Printer.png',
                    'device_description' => 'Mendukung kegiatan administrasi dan pengolahan data BKK',
                ],
                [
                    'device_name' => 'Loker / Almari Arsip BKK',
                    'image' => '/assets/static/partial/Loker.png',
                    'device_description' => 'Tempat penyimpanan dokumen dan arsip BKK',
                ],
                [
                    'device_name' => 'Papan Informasi (Mading)',
                    'image' => '/assets/static/partial/mading.png',
                    'device_description' => 'Media informasi lowongan kerja dan informasi industri bagi siswa dan alumni',
                ],
            ],
        ],
        [
            'type' => 'singleContent',
            'title' => 'Izin Pendirian',
            'content' => 'Berikut merupakan dokumen izin pendirian BKK SMK Negeri 4 Malang:',
            'link_gdrive' => 'https://drive.google.com/file/d/1xognVZz0rcAToXlQ8JDKbQGavoM2Yjw2/preview',
        ],
        [
            'type' => 'singleContent',
            'title' => 'Uraian Tugas',
            'content' => 'Berikut merupakan uraian tugas pengelola BKK SMK Negeri 4 Malang:',
            'link_gdrive' => 'https://drive.google.com/file/d/1M-eMLa1FxsmLqOzbnO6nQ7UepaUOadlR/preview?usp=embed_googleplus',
        ],
        [
            'type' => 'singleContent',
            'title' => 'Logo dan Motto',
            'content' => 'Berikut merupakan logo dan motto BKK SMK Negeri 4 Malang:',
            'link_gdrive' => 'https://drive.google.com/file/d/1ZYd9q3mBSywq3tbNxrkHKmbE1eW81lGZ/preview',
        ],
        [
            'type' => 'singleContent',
            'title' => 'Rekapitulasi MoU',
            'content' => 'Berikut merupakan rekapitulasi MoU BKK SMK Negeri 4 Malang dengan dunia usaha dan dunia industri:',
            'link_gdrive' => 'https://drive.google.com/file/d/1l8m6LEgMOMq7WF0zFfp1OsqSTlB88rwu/preview',
        ],
        [
            'type' => 'singleContent',
            'title' => 'Linieritas Jurusan',
            'content' => 'Berikut merupakan data linieritas jurusan dengan bidang kerja di dunia usaha dan dunia industri BKK SMK Negeri 4 Malang:',
            'link_gdrive' => 'https://drive.google.com/file/d/19tkGPVvsna3IBTXIJvCwLwfpLKZZTDpr/preview?usp=embed_googleplus',
        ],
        [
            'type' => 'singleContent',
            'title' => 'Industri Pasangan',
            'content' => 'Berikut merupakan daftar industri pasangan BKK SMK Negeri 4 Malang:',
            'link_gdrive' => 'https://drive.google.com/file/d/1adql2idJj_vxHrxgoKaP-oYC9o6Okv10/preview?usp=embed_googleplus',
        ],
        [
            'type' => 'singleContent',
            'title' => 'Dokumentasi Kegiatan',
            'content' => 'Berikut merupakan dokumentasi kegiatan BKK SMK Negeri 4 Malang:',
            'link_gdrive' => 'https://drive.google.com/file/d/1ZGyCuD3xvi1MrNT1El97C9UvKUCQsV6T/preview?usp=embed_googleplus',
        ],
        [
            'type' => 'singleContent',
            'title' => 'Evaluasi Kinerja',
            'content' => 'Berikut merupakan hasil evaluasi kinerja BKK SMK Negeri 4 Malang:',
            'link_gdrive' => 'https://drive.google.com/file/d/1AxiyB9KqdVm_mB5bo1Wr7zv7uh7EvhJA/preview?usp=embed_googleplus',
        ],
        [
            'type' => 'singleContent',
            'title' => 'Sharing Praktik Baik',
            'content' => 'Berikut merupakan sharing praktik baik yang dilaksanakan oleh BKK SMK Negeri 4 Malang:',
            'link_gdrive' => 'https://drive.google.com/file/d/1hRH034eSkcyB0zEdk0wSD0eLOl57UyCE/preview?usp=embed_googleplus',
        ],
    ];
    public function render()
    {
        return view('livewire..profil.supporting-documents');
    }
}
