<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Vacancy - BKK SMKN 4 MALANG')]
#[Layout('layouts.app')]
class Vacancy extends Component
{
    public function render()
    {
        return view('livewire.vacancy');
    }
}
