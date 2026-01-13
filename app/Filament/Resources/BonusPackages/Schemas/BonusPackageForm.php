<?php

namespace App\Filament\Resources\BonusPackages\Schemas;

use Dom\Text;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BonusPackageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Bonus Package')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('thumbnail')
                    ->label('Thumbnail Bonus Package')
                    ->image()
                    ->required(),
                Textarea::make('about')
                    ->label('Deskripsi Bonus Package')
                    ->required()
                    ->maxLength(1000),
                TextInput::make('price')
                    ->label('Harga Bonus Package')
                    ->required()
                    ->prefix('Rp ')
                    ->numeric(),
            ]);
    }
}
