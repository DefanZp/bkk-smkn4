<?php

namespace App\Filament\Resources\Applications\Pages;

use App\Filament\Resources\Applications\ApplicationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListApplications extends ListRecords
{
    protected static string $resource = ApplicationResource::class;

    protected static ?string $title = 'Daftar Lamaran';

    protected function getHeaderActions(): array
    {
        return [
            /* CreateAction::make()
            ->label('Buat Lamaran Baru'), */
        ];
    }
}
