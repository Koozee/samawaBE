<?php

namespace App\Filament\Resources\WeddingBonusPackages\Pages;

use App\Filament\Resources\WeddingBonusPackages\WeddingBonusPackageResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditWeddingBonusPackage extends EditRecord
{
    protected static string $resource = WeddingBonusPackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
