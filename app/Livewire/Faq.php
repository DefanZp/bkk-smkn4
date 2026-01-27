<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Faq - BKK SMKN 4 MALANG')]
#[Layout('layouts.app')]
class Faq extends Component
{
    public $faqContent = [
        [
            'title' => 'Apa itu BKK SMK Negeri 4 Malang dan apa perannya bagi siswa dan alumni?',
            'content' => 'BKK SMK Negeri 4 Malang merupakan Bursa Kerja Khusus yang berada di lingkungan sekolah dan berperan sebagai penghubung antara siswa dan alumni dengan dunia usaha dan dunia industri. BKK membantu menyediakan informasi lowongan kerja, memfasilitasi proses rekrutmen, serta mendukung kesiapan siswa dan alumni agar lebih siap dan kompeten dalam memasuki dunia kerja.',
        ],
        [
            'title' => 'Apa itu BKK SMK Negeri 4 Malang dan apa perannya bagi siswa dan alumni?',
            'content' => 'Layanan BKK SMK Negeri 4 Malang dapat dimanfaatkan oleh siswa SMK Negeri 4 Malang, khususnya siswa tingkat akhir, alumni, serta mitra dunia usaha dan dunia industri yang menjalin kerja sama dengan sekolah. BKK hadir untuk membantu proses penyaluran lulusan, penyediaan informasi lowongan kerja, serta mendukung kesiapan siswa dan alumni dalam memasuki dunia kerja.',
        ],
        [
            'title' => 'Mengapa BKK penting bagi siswa dan alumni SMK Negeri 4 Malang?',
            'content' => 'BKK penting bagi siswa dan alumni SMK Negeri 4 Malang karena berperan dalam memberikan akses informasi dunia kerja, menjembatani lulusan dengan dunia usaha dan dunia industri, serta membantu meningkatkan kesiapan dan daya saing siswa dan alumni sebelum memasuki dunia kerja.',
        ],
        [
            'title' => 'Kapan siswa dan alumni dapat mengikuti layanan dan program BKK?',
            'content' => 'Siswa dan alumni dapat mengikuti layanan dan program BKK sesuai dengan jadwal dan informasi resmi yang diumumkan oleh BKK SMK Negeri 4 Malang, baik selama masa sekolah maupun setelah siswa dinyatakan lulus. Informasi tersebut disampaikan melalui media resmi yang disediakan oleh BKK.',
        ],
        [
            'title' => 'Di mana siswa dan alumni dapat memperoleh informasi resmi BKK SMK Negeri 4 Malang?',
            'content' => 'Siswa dan alumni dapat memperoleh informasi resmi BKK SMK Negeri 4 Malang melalui website resmi sekolah, media sosial resmi BKK, papan pengumuman di lingkungan sekolah, serta melalui kontak yang disediakan oleh BKK SMK Negeri 4 Malang.',
        ],
        [
            'title' => 'Bagaimana cara mendaftar dan mengikuti lowongan kerja melalui BKK?',
            'content' => 'Siswa dan alumni dapat mendaftar dan mengikuti lowongan kerja melalui BKK dengan memantau informasi lowongan yang diumumkan oleh BKK SMK Negeri 4 Malang, kemudian melengkapi data dan persyaratan yang dibutuhkan sesuai ketentuan. Selanjutnya, peserta akan mengikuti tahapan seleksi yang ditetapkan oleh BKK dan perusahaan mitra hingga proses penempatan kerja.',
        ],
    ];

    public function render()
    {
        return view('livewire.faq');
    }
}
