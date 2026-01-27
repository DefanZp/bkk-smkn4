<?php

namespace App\Livewire\Profil;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Alur Kerja - BKK SMKN 4 MALANG')]
#[Layout('layouts.app')]
class ActivityFlow extends Component
{
    public function render()
    {
        return view('livewire..profil.activity-flow');
    }
}
