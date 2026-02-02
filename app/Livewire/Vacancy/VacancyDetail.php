<?php

namespace App\Livewire\Vacancy;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Detail Lowongan - BKK SMKN 4 MALANG')]
#[Layout('layouts.app')]
class VacancyDetail extends Component
{
    public function render()
    {
        return view('livewire..vacancy.vacancy-detail');
    }
}
