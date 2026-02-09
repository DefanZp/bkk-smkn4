<?php

namespace App\Filament\Resources\Contacts\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
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


class ContactsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                    Grid::make(2)
                        ->schema([
                            TextInput::make('firstname')
                                ->label('Nama Depan')
                                ->required(),
                            
                            TextInput::make('lastname')
                                ->label('Nama Belakang')
                                ->required(),

                            TextInput::make('email')
                                ->label('Email')
                                ->email()
                                ->required()
                                ->columnSpanFull(),

                            Textarea::make('message')
                                ->label('Pesan')
                                ->required()
                                ->columnSpanFull()
                                ->rows(5),
                    ]),
            ]);
    }
}
