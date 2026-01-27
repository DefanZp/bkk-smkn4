<?php

namespace App\Filament\Resources\Vacancies\Pages;

use App\Filament\Resources\Vacancies\VacancieResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditVacancie extends EditRecord
{
    protected static string $resource = VacancieResource::class;

    protected static ?string $title = 'Edit Lowongan';

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
