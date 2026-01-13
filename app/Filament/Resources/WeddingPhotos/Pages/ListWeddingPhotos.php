<?php

namespace App\Filament\Resources\WeddingPhotos\Pages;

use App\Filament\Resources\WeddingPhotos\WeddingPhotoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListWeddingPhotos extends ListRecords
{
    protected static string $resource = WeddingPhotoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
