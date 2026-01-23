<?php

namespace App\Livewire;

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
            'amount' => '260+',
        ],
        [
            'title' => 'Lulusan Terserap',
            'amount' => '1.200+',
        ],
        [
            'title' => 'Tingkat Keterserapan',
            'amount' => '85%',
        ],
        [
            'title' => 'Program Rekrutmen & Magang',
            'amount' => '50+',
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

    public $lokerSwiperContent = [
        [
            'title' => 'Junior Web Developer',
            'company_name' => 'PT Nusantara Digital Solusi',
            'company_image' => '/assets/static/partial/logo-loker2.png',
            'location' => 'Klojen, Malang',
            'major' => 'Rekayasa Perangkat Lunak',
            'type_job' => 'Full time',
            'salary' => 'Rp 2.000.000 / bulan',
            'last_modified' => '57 menit lalu',
            'detail_link' => '#',
        ],
        [
            'title' => 'Graphic Designer',
            'company_name' => 'CV Prima Kreatif Media',
            'company_image' => '/assets/static/partial/logo-loker1.png',
            'location' => 'Lowokwaru, Malang',
            'major' => 'Desain Komunikasi Visual',
            'type_job' => 'Part Time',
            'salary' => 'Gaji tidak ditampilkan',
            'last_modified' => '1 jam lalu',
            'detail_link' => '#',
        ],
        [
            'title' => 'Operator Produksi',
            'company_name' => 'PT Maju Jaya Manufaktur',
            'company_image' => '/assets/static/partial/logo-loker3.png',
            'location' => 'Sawojajar, Malang',
            'major' => 'Mekatronika',
            'type_job' => 'Full time',
            'salary' => 'Rp 4.500.000 / bulan',
            'last_modified' => '1 jam lalu',
            'detail_link' => '#',
        ],
        [
            'title' => 'Junior Web Developer',
            'company_name' => 'PT Nusantara Digital Solusi',
            'company_image' => '/assets/static/partial/logo-loker2.png',
            'location' => 'Klojen, Malang',
            'major' => 'Rekayasa Perangkat Lunak',
            'type_job' => 'Full time',
            'salary' => 'Rp 2.000.000 / bulan',
            'last_modified' => '57 menit lalu',
            'detail_link' => '#',
        ],
        [
            'title' => 'Graphic Designer',
            'company_name' => 'CV Prima Kreatif Media',
            'company_image' => '/assets/static/partial/logo-loker1.png',
            'location' => 'Lowokwaru, Malang',
            'major' => 'Desain Komunikasi Visual',
            'type_job' => 'Part Time',
            'salary' => 'Gaji tidak ditampilkan',
            'last_modified' => '1 jam lalu',
            'detail_link' => '#',
        ],
        [
            'title' => 'Operator Produksi',
            'company_name' => 'PT Maju Jaya Manufaktur',
            'company_image' => '/assets/static/partial/logo-loker3.png',
            'location' => 'Sawojajar, Malang',
            'major' => 'Mekatronika',
            'type_job' => 'Full time',
            'salary' => 'Rp 4.500.000 / bulan',
            'last_modified' => '1 jam lalu',
            'detail_link' => '#',
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

    public $beritaSwiperContent = [
        [
            'title' => 'Job Fair SMK 2025',
            'description' => 'BKK SMK Negeri 4 Malang akan mengadakan JobFair 2025 di hall sekolah. Jangan melewatkan kesempatan ini untuk mencari lowongan pekerjaan terbaru dari berbagai perusahaan, memperluas relasi profesional, dan  Selengkapnya…',
            'upload_date' => '22 Desember 2025',
            'detail_link' => '#',
            'berita_image' => '/assets/static/partial/jobfair.png',
        ],
        [
            'title' => 'Pengumuman Tes Psikotes Gelombang 2',
            'description' => 'Peserta yang lolos seleksi administrasi diwajibkan mengikuti Tes Psikotes Gelombang 2 sesuai jadwal yang telah ditentukan. Pastikan hadir tepat waktu, berpakaian rapi, serta membawa kartu peserta dan alat tulis pribadi  Selengkapnya…',
            'upload_date' => '31 November 2025',
            'detail_link' => '#',
            'berita_image' => '/assets/static/partial/jobfair2.png',
        ],
        [
            'title' => 'Job Fair SMK 2025',
            'description' => 'BKK SMK Negeri 4 Malang akan mengadakan JobFair 2025 di hall sekolah. Jangan melewatkan kesempatan ini untuk mencari lowongan pekerjaan terbaru dari berbagai perusahaan, memperluas relasi profesional, dan  Selengkapnya…',
            'upload_date' => '22 Desember 2025',
            'detail_link' => '#',
            'berita_image' => '/assets/static/partial/jobfair.png',
        ],
        [
            'title' => 'Pengumuman Tes Psikotes Gelombang 2',
            'description' => 'Peserta yang lolos seleksi administrasi diwajibkan mengikuti Tes Psikotes Gelombang 2 sesuai jadwal yang telah ditentukan. Pastikan hadir tepat waktu, berpakaian rapi, serta membawa kartu peserta dan alat tulis pribadi  Selengkapnya…',
            'upload_date' => '31 November 2025',
            'detail_link' => '#',
            'berita_image' => '/assets/static/partial/jobfair2.png',
        ],
    ];

    public function render()
    {
        return view('livewire.homepage');
    }
}
