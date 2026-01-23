<?php

namespace App\Livewire\Profil;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Visi & Misi - BKK SMKN 4 MALANG')]
#[Layout('layouts.app')]

class VisiMisi extends Component
{
    public function render()
    {
        return view('livewire..profil.visi-misi');
    }
}
