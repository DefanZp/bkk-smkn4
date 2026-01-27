<?php

namespace App\Filament\Resources\Vacancies\Pages;

use App\Filament\Resources\Vacancies\VacancieResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListVacancies extends ListRecords
{
    protected static string $resource = VacancieResource::class;

    protected static ?string $title = 'Daftar Lowongan';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Buat Lowongan Baru'),
        ];
    }
}
