<?php

namespace App\Livewire\Profil;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Program Kerja - BKK SMKN 4 MALANG')]
#[Layout('layouts.app')]
class WorkProgram extends Component
{
    public function render()
    {
        return view('livewire..profil.work-program');
    }
}
