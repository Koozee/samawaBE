<?php

namespace App\Filament\Resources\WeddingPhotos;

use App\Filament\Resources\WeddingPhotos\Pages\CreateWeddingPhoto;
use App\Filament\Resources\WeddingPhotos\Pages\EditWeddingPhoto;
use App\Filament\Resources\WeddingPhotos\Pages\ListWeddingPhotos;
use App\Filament\Resources\WeddingPhotos\Schemas\WeddingPhotoForm;
use App\Filament\Resources\WeddingPhotos\Tables\WeddingPhotosTable;
use App\Models\WeddingPhoto;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WeddingPhotoResource extends Resource
{
    protected static ?string $model = WeddingPhoto::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return WeddingPhotoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WeddingPhotosTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListWeddingPhotos::route('/'),
            'create' => CreateWeddingPhoto::route('/create'),
            'edit' => EditWeddingPhoto::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
