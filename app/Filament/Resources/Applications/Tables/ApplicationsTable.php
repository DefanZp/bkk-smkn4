<?php

namespace App\Filament\Resources\Applications\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\BulkAction;
use App\Services\ApplicationExportService;
use Illuminate\Support\Collection;
use App\Models\Application;

class ApplicationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id_vacancy')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('id_user')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),

                    BulkAction::make('export')
                        ->label('Export Terpilih')
                        ->icon('heroicon-o-arrow-down-tray')
                        ->action(function (Collection $records) {
                            $firstApp = $records->first();
                            if (!$firstApp || !$firstApp->vacancy) {
                                return;
                            }
                            $service = new ApplicationExportService();
                            $zipPath = $service->exportToZip(
                                $records,
                                $firstApp->vacancy->vacancy_name ?? 'Lowongan',
                                $firstApp->vacancy->company->companies_name ?? 'Perusahaan'
                            );
                            return response()->download($zipPath)->deleteFileAfterSend(true);
                        })
                        ->requiresConfirmation()
                        ->modalHeading('Export Lamaran')
                        ->modalDescription('Download data kandidat terpilih sebagai ZIP?')
                        ->deselectRecordsAfterCompletion(),
                ]),
            ]);
    }
}
