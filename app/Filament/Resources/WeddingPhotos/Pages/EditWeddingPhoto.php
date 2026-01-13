<?php

namespace App\Filament\Resources\WeddingPhotos\Pages;

use App\Filament\Resources\WeddingPhotos\WeddingPhotoResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditWeddingPhoto extends EditRecord
{
    protected static string $resource = WeddingPhotoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
