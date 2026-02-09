<?php

namespace App\Filament\Resources\Contacts\Pages;

use App\Filament\Resources\Contacts\ContactsResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewContacts extends ViewRecord
{
    protected static string $resource = ContactsResource::class;

    protected static string $pruralModelLabel = 'daftar pesan';

    protected static ?string $navigationLabel = 'pesan';

    protected static ?string $modelLabel = 'pesan';

    public function getTitle(): string
    {
        return 'Lihat Pesan';
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    
}
