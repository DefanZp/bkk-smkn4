<?php

namespace App\Livewire\Information;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Detail Pengumuman - BKK SMKN 4 MALANG')]
#[Layout('layouts.app')]
class AnnouncementDetail extends Component
{
    public function render()
    {
        return view('livewire..information.announcement-detail');
    }
}
