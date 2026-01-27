<?php

namespace App\Livewire\Profil;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Struktur Organisasi - BKK SMKN 4 MALANG')]
#[Layout('layouts.app')]
class OrganizationStructure extends Component
{
    public function render()
    {
        return view('livewire..profil.organization-structure');
    }
}
