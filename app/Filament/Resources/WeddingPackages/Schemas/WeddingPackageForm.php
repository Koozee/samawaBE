<?php

namespace App\Filament\Resources\WeddingPackages\Schemas;

use App\Models\BonusPackage;
use Dom\Text;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

class WeddingPackageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Fieldset::make('Details')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Paket')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('price')
                            ->label('Harga Paket')
                            ->required()
                            ->prefix('Rp ')
                            ->numeric(),
                        Textarea::make('about')
                            ->label('Deskripsi Paket')
                            ->required()
                            ->maxLength(1000),
                        FileUpload::make('thumbnail')
                            ->label('Gambar Paket')
                            ->image()
                            ->required(),
                        Repeater::make('photos')
                            ->relationship('photos')
                            ->schema([
                                FileUpload::make('photo')
                                    ->label('Foto')
                                    ->image()
                                    ->required(),
                            ])
                    ]),
                Repeater::make('weddingBonusPackages')
                    ->relationship('weddingBonusPackages')
                    ->schema([
                        Select::make('bonus_package_id')
                            ->label('Bonus Package')
                            ->options(BonusPackage::all()->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                    ]),
                Fieldset::make('Additional')
                    ->schema([
                        Select::make('is_popular')
                            ->label('Paket Populer')
                            ->options([
                                True => 'Populer',
                                False => 'Tidak Populer',
                            ])
                            ->required(),
                        Select::make('city_id')
                            ->label('Kota')
                            ->relationship('city', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('wedding_organizer_id')
                            ->label('Wedding Organizer')
                            ->relationship('weddingOrganizer', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                    ]),
            ]);
    }
}
