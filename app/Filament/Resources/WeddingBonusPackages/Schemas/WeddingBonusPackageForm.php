<?php

namespace App\Filament\Resources\WeddingBonusPackages\Schemas;

use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class WeddingBonusPackageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('wedding_package_id')
                    ->label('Wedding Package')
                    ->relationship('weddingPackage', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('bonus_package_id')
                    ->label('Bonus Package')
                    ->relationship('bonusPackage', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }
}
