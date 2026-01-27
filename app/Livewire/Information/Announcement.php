<?php

namespace App\Livewire\Information;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Pengumuman - BKK SMKN 4 MALANG')]
#[Layout('layouts.app')]
class Announcement extends Component
{
    public function render()
    {
        return view('livewire..information.announcement');
    }
}
