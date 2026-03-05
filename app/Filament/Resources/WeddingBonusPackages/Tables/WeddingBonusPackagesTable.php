<?php

namespace App\Filament\Resources\WeddingBonusPackages\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class WeddingBonusPackagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('weddingPackage.name')
                    ->label('Nama Paket')
                    ->default('—')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('bonusPackage.name')
                    ->label('Nama Bonus')
                    ->default('—')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('weddingPackage.price')
                    ->label('Harga')
                    ->default('—')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
