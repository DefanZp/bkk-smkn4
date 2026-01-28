<?php

namespace App\Livewire\Information;

use App\Models\Announcement as AnnouncementModel;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Pengumuman - BKK SMKN 4 MALANG')]
#[Layout('layouts.app')]
class Announcement extends Component
{
    public function render()
    {
        $announcements = AnnouncementModel::where('active_until', '>=', now())
        ->orWhereNull('active_until')
        ->orderBy('created_at', 'desc')
        ->get();
        
        return view('livewire.information.announcement', [
            'announcements' => $announcements,
        ]);
    }
}
