<?php

namespace App\Livewire\Components;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class NotificationUser extends Component
{
    public $notifications = [];

    public function mount()
    {
        $this->deleteOldNotifications();
        
        $this->checkIsTracerStudyFilled();

        
        $dbNotifs = DB::table('notifications')
            ->where('notifiable_id', auth()->id())
            ->where('notifiable_type', 'App\Models\User')
            ->orderBy('created_at', 'desc')
            ->get();

        
        foreach ($dbNotifs as $notif) {
           
            $payload = json_decode($notif->data, true);
            $type = 'job-notif';
            if ($notif->type === 'App\Notifications\AdminMessageNotification') {
                $type = 'admin-message';
            }

            $link = '#';
            if (isset($payload['application_id'])) {
                $link = route('riwayat-lamaran');
            } elseif (isset($payload['vacancy_id'])) {
                $link = route('lowongan-detail', $payload['vacancy_id']);
            }

            $this->notifications[] = [
                'id' => $notif->id,
                'type' => $type,
                'title' => $payload['title'] ?? 'Info Lowongan',
                'message' => $payload['message'] ?? '',
                'link' => $link,
                'created_at' => $notif->created_at,
                'is_read' => !is_null($notif->read_at),
            ];
        }
    }

    public function checkIsTracerStudyFilled() 
    {
        $user = auth()->user();
        if ($user && $user->status === null) {
            $this->notifications[] = [
                'id' => null,
                'type' => 'tracer-study',
                'title' => 'Tracer Study',
                'message' => 'Anda belum mengisi tracer study. Isi sekarang.',
                'link' => route('isi-tracer-study'),
                'created_at' => now(),
                'is_read' => false,
            ];
        }
    }

    public function deleteOldNotifications()
    {
        DB::table('notifications')
            ->where('notifiable_id', auth()->id())
            ->where('notifiable_type', 'App\Models\User')
            ->where('created_at', '<', now()->subDays(30))
            ->delete();
    }

    public function render()
    {
        return view('livewire.components.notification-user');
    }
}