<?php

namespace App\Filament\Resources\WeddingBonusPackages\Pages;

use App\Filament\Resources\WeddingBonusPackages\WeddingBonusPackageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListWeddingBonusPackages extends ListRecords
{
    protected static string $resource = WeddingBonusPackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
