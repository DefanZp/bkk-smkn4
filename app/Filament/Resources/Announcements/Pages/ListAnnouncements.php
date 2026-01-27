<?php

namespace App\Filament\Resources\Announcements\Pages;

use App\Filament\Resources\Announcements\AnnouncementResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAnnouncements extends ListRecords
{
    protected static string $resource = AnnouncementResource::class;

    protected static ?string $title = 'Daftar Pengumuman';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
            ->label('Buat Pengumuman Baru'),
        ];
    }
}
