<?php

namespace App\Livewire;

use App\Models\announcement;
use App\Models\vacancie;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Beranda - BKK SMKN 4 MALANG')]
#[Layout('layouts.app')]

class Homepage extends Component
{
    public $heroSwiperContent = [
        [
            'title' => 'Bursa Kerja Khusus SMK Negeri 4 Malang',
            'description' => 'Bursa Kerja Khusus (BKK) SMK Negeri 4 Malang berperan sebagai penghubung strategis antara alumni dan dunia industri melalui penyediaan informasi lowongan kerja yang aktual, penyaluran, serta penempatan tenaga kerja secara terstruktur dan berkelanjutan.',
            'image' => '/assets/static/background/hero-section.png',
            'cta_link' => '#',
        ],
        [
            'title' => 'Bursa Kerja Khusus SMK Negeri 4 Malang (2)',
            'description' => 'Bursa Kerja Khusus (BKK) SMK Negeri 4 Malang berperan sebagai penghubung strategis antara alumni dan dunia industri melalui penyediaan informasi lowongan kerja yang aktual, penyaluran, serta penempatan tenaga kerja secara terstruktur dan berkelanjutan.',
            'image' => '/assets/static/background/hero-section.png',
            'cta_link' => '#',
        ],
        [
            'title' => 'Bursa Kerja Khusus SMK Negeri 4 Malang (3)',
            'description' => 'Bursa Kerja Khusus (BKK) SMK Negeri 4 Malang berperan sebagai penghubung strategis antara alumni dan dunia industri melalui penyediaan informasi lowongan kerja yang aktual, penyaluran, serta penempatan tenaga kerja secara terstruktur dan berkelanjutan.',
            'image' => '/assets/static/background/hero-section.png',
            'cta_link' => '#',
        ]
    ];

    public $statisticContent = [
    [
        'title' => 'Mitra Industri',
        'amount' => 260,
        'suffix' => '+',
    ],
    [
        'title' => 'Lulusan Terserap',
        'amount' => 1200,
        'suffix' => '+',
    ],
    [
        'title' => 'Tingkat Keterserapan',
        'amount' => 85,
        'suffix' => '%',
    ],
    [
        'title' => 'Program Rekrutmen & Magang',
        'amount' => 50,
        'suffix' => '+',
    ],
];

    public $welcomeContent = [
        [
            'title' => 'Sambutan Kepala Sekolah',
            'image' => '/assets/static/partial/Principal.png',
            'person_name' => 'Dr. Drs. Gunawan Dwiyono, S.ST., M.Pd.',
            'person_position' => 'Kepala SMK Negeri 4 Malang',
        ],
    ];

    public $testimoniSwiperContent = [
        [
            'testimoni' => 'Berkat BKK, saya berhasil bekerja di bidang IT yang saya impikan sejak sekolah. Proses rekrutmennya cepat dan dukungan dari BKK sangat berarti bagi perjalanan karier saya.',
            'person_name' => 'Dimas Prasetyo',
            'graduate_of' => '2021',
            'company_name' => 'PT ABC Teknologi',
            'quote_image' => '/assets/static/partial/quote.png',
        ],
        [
            'testimoni' => 'Saya diterima bekerja di PT Maju Sejahtera berkat info lowongan dari BKK. Saya merasa sangat terbantu dengan bimbingan dan fasilitas yang telah diberikan oleh BKK.',
            'person_name' => 'Ayla Putri',
            'graduate_of' => '2020',
            'company_name' => 'PT Maju Sejahtera',
            'quote_image' => '/assets/static/partial/quote.png',
        ],
        [
            'testimoni' => 'BKK membantu saya mendapatkan pekerjaan pertama saya di PT Astra Otoparts. Terima kasih BKK atas kesempatan dan arahan kariernya.',
            'person_name' => 'Eka Rizky Andika',
            'graduate_of' => '2019',
            'company_name' => 'PT Astra Otoparts Tbk',
            'quote_image' => '/assets/static/partial/quote.png',
        ],
        [
            'testimoni' => 'Berkat BKK, saya berhasil bekerja di bidang IT yang saya impikan sejak sekolah. Proses rekrutmennya cepat dan dukungan dari BKK sangat berarti bagi perjalanan karier saya.',
            'person_name' => 'Dimas Prasetyo',
            'graduate_of' => '2021',
            'company_name' => 'PT ABC Teknologi',
            'quote_image' => '/assets/static/partial/quote.png',
        ],
        [
            'testimoni' => 'Saya diterima bekerja di PT Maju Sejahtera berkat info lowongan dari BKK. Saya merasa sangat terbantu dengan bimbingan dan fasilitas yang telah diberikan oleh BKK.',
            'person_name' => 'Ayla Putri',
            'graduate_of' => '2020',
            'company_name' => 'PT Maju Sejahtera',
            'quote_image' => '/assets/static/partial/quote.png',
        ],
        [
            'testimoni' => 'BKK membantu saya mendapatkan pekerjaan pertama saya di PT Astra Otoparts. Terima kasih BKK atas kesempatan dan arahan kariernya.',
            'person_name' => 'Eka Rizky Andika',
            'graduate_of' => '2019',
            'company_name' => 'PT Astra Otoparts Tbk',
            'quote_image' => '/assets/static/partial/quote.png',
        ],
    ];

    public $vacancies;
    public $announcements;

    public function mount()
    {
        $this->vacancies = vacancie::latest()->take(6)->get();
        $this->announcements = announcement::latest()->take(3)->get();
    }

    public function render()
    {
        return view('livewire.homepage');
    }
}
