<?php

namespace App\Filament\Resources\WeddingTestimonials\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class WeddingTestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
               TextInput::make('name')
                ->required()
                ->maxLength(255),
                FileUpload::make('photo')
                ->image()
                ->required()
                ->uploadButtonPosition('left')
                ->uploadProgressIndicatorPosition('left'),
                Textarea::make('message')
                ->required()
                ->maxLength(255),
                TextInput::make('occupation')
                ->required()
                ->maxLength(255),
                Select::make('wedding_package_id')
                ->relationship('weddingPackage', 'name')
                ->required(),
            ]);
    }
}
