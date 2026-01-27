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
            'title' => 'Bagaimana mengakses BKK  SMK Negeri  4 Malang',
            'content' => 'Jika Alumni belum mengetahui Username dan Password nya. Alumni bisa mengirimkan Email ke bkksmkn2surabaya@gmail.com untuk mendapatkan Username dan Password. Jika Alumni belum mengetahui Username dan Password nya. Alumni bisa mengirimkan Email ke bkksmkn2surabaya@gmail.com untuk mendapatkan Username dan Password.',
        ],
        [
            'title' => 'Bagaimana mengakses BKK  SMK Negeri  4 Malang',
            'content' => 'Jika Alumni belum mengetahui Username dan Password nya. Alumni bisa mengirimkan Email ke bkksmkn2surabaya@gmail.com untuk mendapatkan Username dan Password. Jika Alumni belum mengetahui Username dan Password nya. Alumni bisa mengirimkan Email ke bkksmkn2surabaya@gmail.com untuk mendapatkan Username dan Password.',
        ],
        [
            'title' => 'Bagaimana mengakses BKK  SMK Negeri  4 Malang',
            'content' => 'Jika Alumni belum mengetahui Username dan Password nya. Alumni bisa mengirimkan Email ke bkksmkn2surabaya@gmail.com untuk mendapatkan Username dan Password. Jika Alumni belum mengetahui Username dan Password nya. Alumni bisa mengirimkan Email ke bkksmkn2surabaya@gmail.com untuk mendapatkan Username dan Password.',
        ],
        [
            'title' => 'Bagaimana mengakses BKK  SMK Negeri  4 Malang',
            'content' => 'Jika Alumni belum mengetahui Username dan Password nya. Alumni bisa mengirimkan Email ke bkksmkn2surabaya@gmail.com untuk mendapatkan Username dan Password. Jika Alumni belum mengetahui Username dan Password nya. Alumni bisa mengirimkan Email ke bkksmkn2surabaya@gmail.com untuk mendapatkan Username dan Password.',
        ],
    ];

    public function render()
    {
        return view('livewire.faq');
    }
}
