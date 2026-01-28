<?php

namespace App\Filament\Resources\Vacancies;

use App\Filament\Resources\Vacancies\Pages\CreateVacancie;
use App\Filament\Resources\Vacancies\Pages\EditVacancie;
use App\Filament\Resources\Vacancies\Pages\ListVacancies;
use App\Filament\Resources\Vacancies\Schemas\VacancieForm;
use App\Filament\Resources\Vacancies\Tables\VacanciesTable;
use App\Models\Vacancie;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use App\Models\companie;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Illuminate\Validation\Rules\Numeric;
use Filament\Forms;
use Filament\Tables;


class VacancieResource extends Resource
{
    protected static ?string $model = \App\Models\vacancie::class;

    protected static ?string $navigationLabel = 'Lowongan';

    protected static ?string $modelLabel = 'Lowongan';

    protected static ?string $pluralModelLabel = 'Daftar Lowongan';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBriefcase;

    protected static ?string $recordTitleAttribute = 'vacancie';

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([

            'company_id' => Select::make('company_id')
            ->label('Perusahaan')
            ->relationship('company', 'companies_name')
            ->required()
            ->searchable()
            ->preload(),

            TextInput::make('vacancy_name')
            ->label('nama lowongan')
            ->required(),

            TextInput::make('location')
            ->label('lokasi')
            ->required(),

            TextInput::make('salary')
            ->label('gaji')
            ->numeric()
            ->required(),

            CheckboxList::make('major')
                ->label('jurusan')
                ->options(vacancie::MAJORS)
                ->required(), 

            Select::make('employment_classification')
            ->label('tipe pekerjaan')
            ->options(vacancie::EMPLOYMENT_TYPES)
            ->required(),

            TextInput::make('jobdesk')
            ->label('deskripsi pekerjaan')
            ->required(),

            Textarea::make('requirements')
            ->label('persyaratan')
            ->required(),

            DatePicker::make('deadline')
            ->label('batas akhir')
            ->required(),

            Select::make('loker_tipe')
            ->label('tipe loker')
            ->options(vacancie::LOKER_TYPES)
            ->required(),

            TextInput::make('contact_person')
            ->label('kontak person')
            ->required(),

            TextInput::make('vacancy_number')
            ->label('nomor lowongan')
            ->numeric()
            ->required(), 

            FileUpload::make('image')
            ->label('gambar lowongan')
            ->disk('public')
            ->directory('vacancies')
            ->image()
            ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('company.companies_name')->label('Perusahaan')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('vacancy_name')->label('Nama Lowongan')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('location')->label('Lokasi')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('employment_classification')->label('Tipe Pekerjaan')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('salary')->label('Gaji')->money('idr', true)->sortable(),
            Tables\Columns\TextColumn::make('deadline')->label('Batas Akhir')->date()->sortable(),
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
            'index' => ListVacancies::route('/'),
            'create' => CreateVacancie::route('/create'),
            'edit' => EditVacancie::route('/{record}/edit'),
        ];
    }
    
}
