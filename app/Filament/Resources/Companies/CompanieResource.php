<?php

namespace App\Filament\Resources\Companies;

use App\Filament\Resources\Companies\Pages\CreateCompanie;
use App\Filament\Resources\Companies\Pages\EditCompanie;
use App\Filament\Resources\Companies\Pages\ListCompanies;
use App\Filament\Resources\Companies\Schemas\CompanieForm;
use App\Filament\Resources\Companies\Tables\CompaniesTable;
use App\Models\Companie;
use Filament\Forms;
use Filament\Tables;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Components\Textarea;

class CompanieResource extends Resource
{
    protected static ?string $model = Companie::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'companie';

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('companies_name')->required()->label('nama perusahaan'),
            FileUpload::make('companies_logo')->required()->label('logo perusahaan'),
            Textarea::make('companies_profile')->required()->label('profil perusahaan'),
            TextInput::make('location')->required()->label('lokasi perusahaan'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('companies_name')->label('nama perusahaan')->searchable()->sortable(),
            Tables\Columns\ImageColumn::make('companies_logo')->label('logo perusahaan'),
            Tables\Columns\TextColumn::make('companies_profile')->label('profil perusahaan')->limit(50),
            Tables\Columns\TextColumn::make('location')->label('lokasi perusahaan')->searchable()->sortable(),
        ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCompanies::route('/'),
            'create' => CreateCompanie::route('/create'),
            'edit' => EditCompanie::route('/{record}/edit'),
        ];
    }
}
