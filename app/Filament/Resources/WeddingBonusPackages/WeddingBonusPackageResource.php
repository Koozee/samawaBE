<?php

namespace App\Filament\Resources\WeddingBonusPackages;

use App\Filament\Resources\WeddingBonusPackages\Pages\CreateWeddingBonusPackage;
use App\Filament\Resources\WeddingBonusPackages\Pages\EditWeddingBonusPackage;
use App\Filament\Resources\WeddingBonusPackages\Pages\ListWeddingBonusPackages;
use App\Filament\Resources\WeddingBonusPackages\Schemas\WeddingBonusPackageForm;
use App\Filament\Resources\WeddingBonusPackages\Tables\WeddingBonusPackagesTable;
use App\Models\WeddingBonusPackage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WeddingBonusPackageResource extends Resource
{
    protected static ?string $model = WeddingBonusPackage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return WeddingBonusPackageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WeddingBonusPackagesTable::configure($table);
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
            'index' => ListWeddingBonusPackages::route('/'),
            'create' => CreateWeddingBonusPackage::route('/create'),
            'edit' => EditWeddingBonusPackage::route('/{record}/edit'),
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
