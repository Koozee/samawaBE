<?php

namespace App\Filament\Resources\WeddingOrganizers\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class WeddingOrganizerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('phone')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('icon')
                    ->image()
                    ->required()
                    ->uploadButtonPosition('left')
                    ->uploadProgressIndicatorPosition('left')
            ]);
    }
}
