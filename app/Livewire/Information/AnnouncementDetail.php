<?php

namespace App\Livewire\Information;

use App\Models\announcement;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Detail Pengumuman - BKK SMKN 4 MALANG')]
#[Layout('layouts.app')]
class AnnouncementDetail extends Component
{
    public $announcementId;
    public $announcement;

    public function mount($id)
    {
        $this->announcementId = $id;
        $this->announcement = announcement::where('id', $this->announcementId)
        ->firstOrFail();
    }

    public function render()
    {
        return view('livewire..information.announcement-detail');
    }
}
